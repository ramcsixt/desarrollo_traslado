/** variables del formulario  */
var idRegistro, status, dni,nombre,apellido,cargo,correo,password,password2, url, val=true;


$(document).ready(function() {
    console.log('hola estoy aqui')
    $('#asignarModulo').hide();
    $('#darBajaAlta').hide()
    $('#editar').hide()
    url = $("#url").val();
    id_usuario = $("#idUsuario").val();
    console.log(url, id_usuario);
    var table = $('#listaUsuario').DataTable( {
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true,
        "bPaginate": true,
        "lengthMenu": true,
        "iDisplayLength": 8,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": true,
        "bAutoWidth": true,
        "searching": true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }, 
        "ajax": {
            url : url+'index.php/usuario/listar_usuario',
            type : 'GET'
        },
             
    });
    /*$('#listaUsuario tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        alert( 'You clicked on '+data[5]+'\'s row' );
    });*/
       
    url = $('#url').val()
    $('#error_mensaje').hide()
    
    $(".alerta").click(function () {
        $('#error_mensaje').hide(700)
        $('#cuerpo_mensaje').text('');
    })

    
    $("#userNew").click(function () {
        $('#actualizarUsuario').hide();
        $('.titulo-panel').text('Registrar Usuario');
        $('#guardarUsuario').show(700);
        $("#modalNewUsuario").modal("show");
    });

    $("#guardarUsuario").click(function () {
          //var csrf_test_name = $("input[name=csrf_test_name]").val();
        dni =$("#dni").val();
        nombre =$("#nombre").val();
        apellido =$("#apellido").val();
        cargo =$("#cargo").val();
        password =$("#password").val();
        password2 =$("#password2").val();

        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

        if (dni == "") {
            $('#cuerpo_mensaje').text('Ingrese numero DNI del usuario!');
            $('#error_mensaje').show(700);
            val=false;
           
        } 
        if (nombre == "") {
            console.log('estoy en unombre')
            $('#cuerpo_mensaje').text('Ingrese nombre del usuario!');
            $('#error_mensaje').show(700);
            val=false;
           
        } 
        if (apellido == "") {
            $('#cuerpo_mensaje').text('Ingrese Apellido del usuario!');
            $('#error_mensaje').show(700);
            val=false;
            return false;
        } 
        if (cargo == "") {
            $('#cuerpo_mensaje').text('Ingrese Cargo del usuario!');
            $('#error_mensaje').show(700);
            val=false;
            return false;
        } 
        if (regex.test($('#correo').val().trim())) {
            correo 	   = $("#correo").val();
        } else {
            $('#cuerpo_mensaje').text('Ingrese Correo valido!');
            $('#error_mensaje').show(700);
            val=false;
            return false;
        } 
        if (password == "") {
            $('#cuerpo_mensaje').text('Ingrese Password!');
            $('#error_mensaje').show(700);
            val=false;
            return false;
        } 
        if (password2 != password) {
            $('#cuerpo_mensaje').text('Las Contraseñas no Coinciden!');
            $('#error_mensaje').show(700);
            val=false;
            return false;
        } 

        if (val) {
            $.ajax({
                data: { 
                    'dni' : dni,
                    'nombre' : nombre,
                    'apellido' : apellido, 
                    'cargo' : cargo,
                    'correo' : correo,
                    'password' : password
                },
                url:   url+'crear_usuario',
                type:  'POST',
                dataType: 'json',
                success:  function (r) 
                { 
                   console.log(r)
                   if (r==3) {
                        $('#cuerpo_mensaje').text('Existe un usuario registrado con este correo!');
                        $('#error_mensaje').show(700);
                   }else{
                        $ ('#listaUsuario').DataTable().ajax.reload();
                        $('#asignarModulo').hide(700)
                        $('#darBajaAlta').hide(700)
                        $('#editar').hide(700)
                        $("#modalNewUsuario").modal("hide"); 
                         $("#dni").val('');
                        $("#nombre").val('');
                        $("#apellido").val('');
                        $("#cargo").val('');
                        $("#correo").val('');
                        $("#password").val('');
                        $("#password2").val('');
                        
                   }
                   

                },
                error: function()
                {
                    console.log('Ocurrio un error en el servidor ..');
                }
            });
        }  
    });

    $("#editar").click(function () {

        $.ajax({
            data: { 
                'id_usuario' : idRegistro,
            },
            url:   url+'buscar_usuario',
            type:  'POST',
            dataType: 'json',
            success:  function (r) 
            { 
                cargarUsuario(r);
            },
            error: function()
            {
                console.log('Ocurrio un error en el servidor ..');
            }
        });
    });

    $("#actualizarUsuario").click(function () {
        //var csrf_test_name = $("input[name=csrf_test_name]").val();
      dni =$("#dni").val();
      nombre =$("#nombre").val();
      apellido =$("#apellido").val();
      cargo =$("#cargo").val();
      password =$("#password").val();
      password2 =$("#password2").val();

      var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

      if (dni == "") {
          $('#cuerpo_mensaje').text('Ingrese numero DNI del usuario!');
          $('#error_mensaje').show(700);
          val=false;
         
      } 
      if (nombre == "") {
          console.log('estoy en unombre')
          $('#cuerpo_mensaje').text('Ingrese nombre del usuario!');
          $('#error_mensaje').show(700);
          val=false;
         
      } 
      if (apellido == "") {
          $('#cuerpo_mensaje').text('Ingrese Apellido del usuario!');
          $('#error_mensaje').show(700);
          val=false;
          return false;
      } 
      if (cargo == "") {
          $('#cuerpo_mensaje').text('Ingrese Cargo del usuario!');
          $('#error_mensaje').show(700);
          val=false;
          return false;
      } 
      if (regex.test($('#correo').val().trim())) {
          correo 	   = $("#correo").val();
      } else {
          $('#cuerpo_mensaje').text('Ingrese Correo valido!');
          $('#error_mensaje').show(700);
          val=false;
          return false;
      } 
      if (password == "") {
          $('#cuerpo_mensaje').text('Ingrese Password!');
          $('#error_mensaje').show(700);
          val=false;
          return false;
      } 
      if (password2 != password) {
          $('#cuerpo_mensaje').text('Las Contraseñas no Coinciden!');
          $('#error_mensaje').show(700);
          val=false;
          return false;
      } 

      if (val) {
          $.ajax({
              data: { 
                  'id_usuario': idRegistro,
                  'dni' : dni,
                  'nombre' : nombre,
                  'apellido' : apellido, 
                  'cargo' : cargo,
                  'correo' : correo,
                  'password' : password
              },
              url:   url+'actualizar_usuario',
              type:  'POST',
              dataType: 'json',
              success:  function (r) 
              { 
                 console.log(r)
                 if (r==3) {
                      $('#cuerpo_mensaje').text('Existe un usuario registrado con este correo!');
                      $('#error_mensaje').show(700);
                 }else{
                      $ ('#listaUsuario').DataTable().ajax.reload();
                      $('#asignarModulo').hide(700)
                      $('#darBajaAlta').hide(700)
                      $('#editar').hide(700)
                      $("#modalNewUsuario").modal("hide"); 
                       $("#dni").val('');
                      $("#nombre").val('');
                      $("#apellido").val('');
                      $("#cargo").val('');
                      $("#correo").val('');
                      $("#password").val('');
                      $("#password2").val('');
                      
                 }
                 

              },
              error: function()
              {
                  console.log('Ocurrio un error en el servidor ..');
              }
          });
      }  
    });
    $("#darBajaAlta").click(function(){
        $.ajax({
            data: { 
                'id_usuario': idRegistro,
                'status' : status,
            },
            url:   url+'cambio_status',
            type:  'POST',
            dataType: 'json',
            success:  function (r) 
            { 
                $ ('#listaUsuario').DataTable().ajax.reload();
            },
            error: function()
            {
                console.log('Ocurrio un error en el servidor ..');
            }
        }); 
    });
});

function ruUsuario(id, estado) {
    status = estado;
    if (status == 1) {
        $('#darBajaAlta').text('Dar de Baja');
        $("#darBajaAlta").addClass("btn-outline-danger");
        $("#darBajaAlta").removeClass("btn-outline-primary");
    }
    else{
        $('#darBajaAlta').text('Dar de ALta');
        $("#darBajaAlta").addClass("btn-outline-primary");
        $("#darBajaAlta").removeClass("btn-outline-danger");
    }
    $('#asignarModulo').show(700)
    $('#darBajaAlta').show(700)
    $('#editar').show(700)
    idRegistro = id;
    console.log('id usuario', id)
    
}
function cargarUsuario(r) {
    $(r).each(function(i, v){ // indice, valor
        dni = v.dni;
        nombre = v.nombre;
        apellido = v.apellido;
        cargo = v.cargo;
        correo = v.usuario
        password = v.clave;
        password2 = v.clave;
    })
    $("#dni").val(dni);
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#cargo").val(cargo);
    $("#correo").val(correo);
    $("#password").val(password);
    $("#password2").val(password2);
    $('#guardarUsuario').hide();
    $('.titulo-panel').text('Actualizar Registro de Usuario');
    $('#actualizarUsuario').show(700);
    $("#modalNewUsuario").modal("show");
 
}

