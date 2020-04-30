/** variables culqui */
Culqi.publicKey = 'pk_test_Ui8yriJmSCYSQEN1';
var producto = 'Servicio de Traslado', precio = '', description='';

var paso = 1, paso1=0, paso2=0, paso3=0, paso4=0, val;
/** variables paso 1 */
var full_nombre, correo, tel_movil, link;

/** variables paso 2 */
var ubicacion_ida, ubicacion_vuelta, type, map, observacion, metodo_pago;
/** variables paso 3 */
var nuevoViaje, tarifa, tarifa_total=0, cantida_viaje, fecha_ida, hora_ida, item, datoViajes = [];

$(document).ready(function() {
    /*OCURTAMOS DIV DE LOS MENSAJE DE VALIDACION */
    link = $("#url").val();
    $('#error_mensaje').hide(); //muestro mediante id
    cargar_mapa();
    
    $("#next").click(function () {
        $('#error_mensaje').hide(1000); //muestro mediante id
   
        if (paso == 1) {
            console.log('estoy en la funcion')
            next1();
        }
        else if (paso == 2) {
          next2();
        }
        else if (paso == 3) {
            console.log('voy para el paso 4')
            next3();
        }
        else if (paso == 4) {
            console.log('estoy en paso 4')
            next4();
        }
        
    });
    $("#rev").click(function () {
        $('#error_mensaje').hide(1000); //muestro mediante id
        paso--;
       
        if (paso == 1) {
            $("#circle1n").css("background-color", "rgb(255, 95, 0)");
            $("#circle1l").css("color", "rgb(255, 95, 0)");

            if (paso2==1) { 
                $("#circle2n").css("background-color", "#000000"); 
                $("#circle2l").css("color", "#000000");

            } else { 
                $("#circle2n").css("background-color", "#969696");
                $("#circle2l").css("color", "#969696");
            }
            if (paso3==1) { 
                $("#circle3n").css("background-color", "#000000"); 
                $("#circle3l").css("color", "#000000");
            } else { 
                $("#circle3n").css("background-color", "#969696");
                $("#circle3l").css("color", "#969696");
            }
            if (paso4==1) { 
                $("#circle4n").css("background-color", "#000000");
                $("#circle4l").css("color", "#000000"); 
             } else { 
                 $("#circle4n").css("background-color", "#969696");
                $("#circle4l").css("color", "#969696");
            }  
            $("#pagin").text('Paso 1 de 4'); 
            $('#rev').hide(700); //muestro mediante id
            $('#paso4').hide(700); //muestro mediante id
            $('#paso3').hide(700); //muestro mediante id
            $('#paso2').hide(700); //muestro mediante id
            $('#paso1').show(700); //muestro mediante id   
            $('#pagoEnvio').hide(1000); //muestro mediante id      
        }
        if (paso == 2) {
            $("#circle2n").css("background-color", "rgb(255, 95, 0)");
            $("#circle2l").css("color", "rgb(255, 95, 0)");
            if (paso1==1) { 
                $("#circle2n").css("background-color", "#000000"); 
                $("#circle2l").css("color", "#000000");
            }
            if (paso3==1) { 
                $("#circle3n").css("background-color", "#000000");
                $("#circle3l").css("color", "#000000");
             } else { 
                 $("#circle3n").css("background-color", "#969696");
                 $("#circle3l").css("color", "#969696");}
            if (paso4==1) { 
                $("#circle4n").css("background-color", "#000000"); 
                $("#circle4l").css("color", "#000000");
            } else { 
                $("#circle4n").css("background-color", "#969696");
                $("#circle4l").css("color", "#969696");}     
            $("#pagin").text('Paso 2 de 4');
            $('#paso4').hide(700); //muestro mediante id
            $('#paso3').hide(700); //muestro mediante id
            $('#paso1').hide(700); //muestro mediante id
            $('#paso2').show(700); //muestro mediante id    
            $('#pagoEnvio').hide(1000); //muestro mediante id  
        }
        if (paso == 3) {

            $("#circle3n").css("background-color", "rgb(255, 95, 0)");
            $("#circle3l").css("color", "rgb(255, 95, 0)");
            if (paso1==1) { 
                $("#circle2n").css("background-color", "#000000"); 
                $("#circle2l").css("color", "#000000");
            }
            if (paso2==1) { 
                $("#circle3n").css("background-color", "#000000");
                $("#circle3l").css("color", "#000000"); }
            if (paso4==1) {
                 $("#circle4n").css("background-color", "#000000");
                $("#circle4l").css("color", "#000000"); 
            } else { 
                $("#circle4n").css("background-color", "#969696");
                $("#circle4l").css("color", "#969696");
            }     
            $("#pagin").text('Paso 3 de 4');
            $('#next').show(700); //muestro mediante id
            $('input[name="metodo_pago"]').prop('checked', false);
            $('#enviar').hide(700); //muestro mediante id
            $('#paso4').hide(700); //muestro mediante id
            $('#paso2').hide(700); //muestro mediante id
            $('#paso1').hide(700); //muestro mediante id
            $('#paso3').show(700); //muestro mediante id   
            $('#pagoEnvio').hide(1000); //muestro mediante id  
        }
        if (paso == 4) {
            $("#circle4n").css("background-color", "rgb(255, 95, 0)");
            $("#circle4l").css("color", "rgb(255, 95, 0)");
            if (paso1==1) {
                $("#circle1n").css("background-color", "#000000");
                $("#circle1l").css("color", "#000000"); 
            }
            if (paso3==1) { 
                $("#circle2n").css("background-color", "#000000");
                $("#circle2l").css("color", "#000000");
            }
            if (paso2==1) {
                 $("#circle3n").css("background-color", "#000000"); 
                 $("#circle3l").css("color", "#000000");}    
            $("#pagin").text('Paso 4 de 4');
            $('#pagoEnvio').hide(1000); //muestro mediante id
            $('#next').show(1000); //muestro mediante id
            $('#paso2').hide(1000); //muestro mediante id
            $('#paso3').hide(1000); //muestro mediante id
            $('#paso1').hide(1000); //muestro mediante id
            $('#paso4').show(1000); //muestro mediante id     
        }
    });

    $('#circle1').on('click', function() {
        console.log(paso1,'estoy en paso 1')
        if (paso1 == 1) {
            $("#circle1n").css("background-color", "rgb(255, 95, 0)");
            $("#circle1l").css("color", "rgb(255, 95, 0)");

            if (paso2==1) { 
                $("#circle2n").css("background-color", "#000000"); 
                $("#circle2l").css("color", "#000000");

            } else { 
                $("#circle2n").css("background-color", "#969696");
                $("#circle2l").css("color", "#969696");
            }
            if (paso3==1) { 
                $("#circle3n").css("background-color", "#000000"); 
                $("#circle3l").css("color", "#000000");
            } else { 
                $("#circle3n").css("background-color", "#969696");
                $("#circle3l").css("color", "#969696");
            }
            if (paso4==1) { 
                $("#circle4n").css("background-color", "#000000");
                $("#circle4l").css("color", "#000000"); 
             } else { 
                 $("#circle4n").css("background-color", "#969696");
                $("#circle4l").css("color", "#969696");
            }  
            $("#pagin").text('Paso 1 de 4'); 
            $('#rev').hide(700); //muestro mediante id
            $('#paso4').hide(700); //muestro mediante id
            $('#paso3').hide(700); //muestro mediante id
            $('#paso2').hide(700); //muestro mediante id
            $('#paso1').show(700); //muestro mediante id   
            $('#pagoEnvio').hide(1000); //muestro mediante id      
        }
    });
    $('#circle2').on('click', function() {
        if (paso2 == 2) {
            $("#circle2n").css("background-color", "rgb(255, 95, 0)");
            $("#circle2l").css("color", "rgb(255, 95, 0)");
            if (paso1==1) { 
                $("#circle2n").css("background-color", "#000000"); 
                $("#circle2l").css("color", "#000000");
            }
            if (paso3==1) { 
                $("#circle3n").css("background-color", "#000000");
                $("#circle3l").css("color", "#000000");
             } else { 
                 $("#circle3n").css("background-color", "#969696");
                 $("#circle3l").css("color", "#969696");}
            if (paso4==1) { 
                $("#circle4n").css("background-color", "#000000"); 
                $("#circle4l").css("color", "#000000");
            } else { 
                $("#circle4n").css("background-color", "#969696");
                $("#circle4l").css("color", "#969696");}     
            $("#pagin").text('Paso 2 de 4');
            $('#paso4').hide(700); //muestro mediante id
            $('#paso3').hide(700); //muestro mediante id
            $('#paso1').hide(700); //muestro mediante id
            $('#paso2').show(700); //muestro mediante id    
            $('#pagoEnvio').hide(1000); //muestro mediante id  
        }
    });
    $('#circle3').on('click', function() {
        if (paso == 3) {

            $("#circle3n").css("background-color", "rgb(255, 95, 0)");
            $("#circle3l").css("color", "rgb(255, 95, 0)");
            if (paso1==1) { 
                $("#circle2n").css("background-color", "#000000"); 
                $("#circle2l").css("color", "#000000");
            }
            if (paso2==1) { 
                $("#circle3n").css("background-color", "#000000");
                $("#circle3l").css("color", "#000000"); }
            if (paso4==1) {
                 $("#circle4n").css("background-color", "#000000");
                $("#circle4l").css("color", "#000000"); 
            } else { 
                $("#circle4n").css("background-color", "#969696");
                $("#circle4l").css("color", "#969696");
            }     
            $("#pagin").text('Paso 3 de 4');
            $('#next').show(700); //muestro mediante id
            $('input[name="metodo_pago"]').prop('checked', false);
            $('#enviar').hide(700); //muestro mediante id
            $('#paso4').hide(700); //muestro mediante id
            $('#paso2').hide(700); //muestro mediante id
            $('#paso1').hide(700); //muestro mediante id
            $('#paso3').show(700); //muestro mediante id   
            $('#pagoEnvio').hide(1000); //muestro mediante id  
        }
    });
    $('#circle4').on('click', function() {
        if (paso == 4) {
            $("#circle4n").css("background-color", "rgb(255, 95, 0)");
            $("#circle4l").css("color", "rgb(255, 95, 0)");
            if (paso1==1) {
                $("#circle1n").css("background-color", "#000000");
                $("#circle1l").css("color", "#000000"); 
            }
            if (paso3==1) { 
                $("#circle2n").css("background-color", "#000000");
                $("#circle2l").css("color", "#000000");
            }
            if (paso2==1) {
                 $("#circle3n").css("background-color", "#000000"); 
                 $("#circle3l").css("color", "#000000");}    
            $("#pagin").text('Paso 4 de 4');
            $('#pagoEnvio').hide(1000); //muestro mediante id
            $('#next').show(1000); //muestro mediante id
            $('#paso2').hide(1000); //muestro mediante id
            $('#paso3').hide(1000); //muestro mediante id
            $('#paso1').hide(1000); //muestro mediante id
            $('#paso4').show(1000); //muestro mediante id     
        }
    });
    $("#add").click(function () {
        val = true;
        fecha_ida = $("#fecha_ida").val();
        hora_ida = $("#hora_ida").val();
        item = $("#add").val();
      
       if(fecha_ida == ""){
            val=false;
            $("#cuerpo_mensaje").text('Error! Seleccione fecha de recojo');
            $('#error_mensaje').show(1000); //muestro mediante id
            //$('#mensaje').show('slow');
        // $("#full_nombre").focus();
            return false;
        } 
        if(hora_ida == ""){
            val=false;
            $("#cuerpo_mensaje").text('Error! Ingrese hora de recojo');
            $('#error_mensaje').show(1000); //muestro mediante id
            //$('#mensaje').show('slow');
        // $("#full_nombre").focus();
            return false;
        }  
        if(val){
            var km = 6;
            var cont = capturar(fecha_ida, hora_ida, km, item);
            if (cont) {
                item++;
                $("#add").val(item);
            }

        }     
        
    });
    $("#metodo_pago2").click(function(){
        $('#pagoEnvio').text('Enviar'); //muestro mediante id
        $('#pagoEnvio').val(0); //muestro mediante id
        $('#pagoEnvio').show(1000); //muestro mediante id
    });
    $("#metodo_pago1").click(function(){
        $('#pagoEnvio').text('Pagar'); //muestro mediante id
        $('#pagoEnvio').val(1); //muestro mediante id
        $('#pagoEnvio').show(1000); //muestro mediante id

    });
   
   $('#cerrar_mensaje').on('click', function() {
       if (type) {
            $('#mensaje').hide(1000);  //muestro mediante id
            window.location=link;
       }else{
           $('#mensaje').hide(1000);  //muestro mediante id

       }
    });
  
   

    $('#pagoEnvio').on('click', function(e) {
        var tipo_pago = $("#pagoEnvio").val();
        console.log(tipo_pago)
        if (tipo_pago == 1) {
            
            var observacion = $("observacion").val();
            var metodo_pago = $('input:radio[name="metodo_pago"]:checked').val();
           
            precio = tarifa_total*100;
            descripcion = producto
            Culqi.options({
                lang: 'auto',
                modal: true,
               // installments: true,
                //customButton: 'Donar',
                style: {
                  logo: 'https://sixtperu.pe/desarrollo/traslado/Public/rux/images/icons/72x72.png',
                  maincolor: '#0ec1c1',
                  buttontext: '#FF5F00',
                  maintext: '#4A4A4A',
                  desctext: '#4A4A4A'
                }
            });
            Culqi.settings({
                title: producto, 
                currency: 'PEN',
                description: descripcion,
                amount: precio
            });
            // Abre el formulario con la configuración en Culqi.settings
            Culqi.open();
            e.preventDefault();
        }
        else{
            console.log('pago_envio')
        }
    });
  
    /*OCURTAMOS DIV DE LOS MENSAJE DE VALIDACION */
    $('#full_nombre').on('keyup', function() {
        $('#error_mensaje').hide(1000); //muestro mediante id
    });
    $('#correo').on('keyup', function() {
        $('#error_mensaje').hide(1000); //muestro mediante id
    });
    $('#tel_movil').on('keyup', function() {
        $('#error_mensaje').hide(1000); //muestro mediante id
    });
    $('#hora_ida').on('clck', function() {
        $('#error_mensaje').hide(1000); //muestro mediante id
    });
    $('#fecha_ida').on('click', function() {
        $('#error_mensaje').hide(1000); //muestro mediante id
    });
});

function next1() {
    val = true;
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    full_nombre = $("#full_nombre").val();
    tel_movil   = $("#tel_movil").val();   
    console.log('estoy en la funcion2')
    if(full_nombre == ""){
        val=false;
        $("#cuerpo_mensaje").text('Error! Ingrese Nombre');
        $('#error_mensaje').show(700); //muestro mediante id
        //$('#mensaje').show('slow');
    // $("#full_nombre").focus();
        return false;
    }
    if (regex.test($('#correo').val().trim())) {
       var correo      = $("#correo").val();

    } else {
        val=false;
        $("#cuerpo_mensaje").text('Error! Ingrese Correo Valido');
        $('#error_mensaje').show(700); //muestro mediante id
        // $("#full_nombre").focus();
        return false;
    }    
    
    if(tel_movil == ""){
        val=false;
        $("#cuerpo_mensaje").text('Error! Ingrese Número de telefono movil');
        $('#error_mensaje').show(700); //muestro mediante id
    // $("#full_nombre").focus();
        return false;
    }  
    if(val){
        if (paso == 1) {
            paso2=1;
            paso++;
            console.log(paso2, paso)
            //$("#boton02").remove();
           // $("#circle1").append('<button  type="button" class="btn btn-circle" style="background-color: rgb(255, 95, 0); color:white">1</button>');
            $("#circle1n").css("background-color", "#000000");
            $("#circle1l").css("color", "#000000");
            $("#cheked").addClass("fa fa-check");
            $("#cheked").text("");
            $("#circle2n").css("background-color", "rgb(255, 95, 0)");
            $("#circle2l").css("color", "rgb(255, 95, 0)");
            $("#pagin").text('Paso 2 de 4');
            $('#rev').show(700); //muestro mediante id
            $('#paso1').hide(700); //muestro mediante id
            $('#paso2').show(700); //muestro mediante id
        }
        $.ajax({
            data: { 
                   'full_nombre': full_nombre,
                    'tel_movil' : tel_movil,
                    'correo'    :  correo
           	},
            url:   'index.php/traslado/enviar_prospecto',
            type:  'POST',
            dataType: 'json',
            success:  function (r) 
            { 
                console.log('prospecto registrado ..');
            },
            error: function()
            {
                console.log('Ocurrio un error en el servidor ..');
            }
        });
        
    }   
    
}
function next2() {
    ubicacion_ida    = $("#ubicacion_ida").val();
    ubicacion_vuelta = $("#ubicacion_vuelta").val();
    val = true;
    if(ubicacion_ida == ""){
        val=false;
        $("#cuerpo_mensaje").text('Error! Ingrese la ubicación de origen');
        $('#error_mensaje').show(700); //muestro mediante id
        //$('#mensaje').show('slow');
        // $("#full_nombre").focus();
        return false;
    }    
    if(ubicacion_vuelta == ""){
        val=false;
        $("#cuerpo_mensaje").text('Error! Ingrese la ubicación de origen');
        $('#error_mensaje').show(700); //muestro mediante id
        // $("#full_nombre").focus();
        return false;
    }    
    
    if(val){
        if (paso == 2) {
            paso++;
            paso3=1;
            //$("#boton02").remove();
            // $("#circle1").append('<button  type="button" class="btn btn-circle" style="background-color: rgb(255, 95, 0); color:white">1</button>');
            $("#circle1n").css("background-color", "#000000");
            $("#circle2n").css("background-color", "#000000");
            $("#circle3n").css("background-color", "rgb(255, 95, 0)");
            $("#circle1l").css("color", "#000000");
            $("#circle2l").css("color", "#000000");
            $("#circle3l").css("color", "rgb(255, 95, 0)");
            $('#rev').show(700); //muestro mediante id
            $("#pagin").text('Paso 3 de 4');
            $('#paso2').hide(700); //muestro mediante id
            $('#paso3').show(700); //muestro mediante id
        }
        
    }   
    
}
function next3() {
    console.log('estoy paso 4', cantida_viaje, paso)
    val = true;
    
   // if(!$('input[name="metodo_pago"]').is(':checked')){var tipoPago = 0; }
   console.log(cantida_viaje)
    if(cantida_viaje > 0){
        if (paso == 3) {
            paso++;
            paso4=1;
            //$("#boton02").remove();
            // $("#circle1").append('<button  type="button" class="btn btn-circle" style="background-color: rgb(255, 95, 0); color:white">1</button>');
            $("#circle1n").css("background-color", "#000000");
            $("#circle2n").css("background-color", "#000000");
            $("#circle3n").css("background-color", "#000000");
            $("#circle1l").css("color", "#000000");
            $("#circle2l").css("color", "#000000");
            $("#circle3l").css("color", "#000000");
            $('#rev').show(700); //muestro mediante id
            $("#circle4n").css("background-color", "rgb(255, 95, 0)");
            $("#circle4l").css("color", "rgb(255, 95, 0)");
            $("#pagin").text('Paso 4 de 4');
            $('#next').hide(700); //muestro mediante id
            $('#paso3').hide(700); //muestro mediante id
            $('#paso4').show(700); //muestro mediante id

        }
        
    }else{
        $("#cuerpo_mensaje").text('Error! Debe de añadir por lo menos un registro');
        $('#error_mensaje').show(700); //muestro mediante id
        //$('#mensaje').show('slow');
    }
}


function next4() {
   console.log(paso)
    
}

function capturar(fecha_ida, hora_ida, km, item) {
    
    function Viaje(id, fecha, hora, monto) {
        this.fecha_ida = fecha;
        this.hora_ida = hora;
        this.tarifa = monto;
        this.item = id;
    }
    var fechaIda = fecha_ida;
    var horaIda = hora_ida;
    var tarifa_item = (km*1);
    var idm = item;
    nuevoViaje = new Viaje(idm, fechaIda, horaIda, tarifa_item);
    agregarViaje(); 
    return true  ;
}
function agregarViaje() {
    datoViajes.push(nuevoViaje);

    document.getElementById("cuerpo_tabla").innerHTML="";
    tarifa_total=0;
    cantida_viaje=0;
    datoViajes.forEach(function (elemento, indice, array) { 
        cantida_viaje = indice + 1;
        tarifa_total = tarifa_total + elemento.tarifa;
        var fecha_convertida = elemento.fecha_ida.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
        document.getElementById("cuerpo_tabla").innerHTML+='<tr><th scope="row">'+ fecha_convertida +'</th><td>'+ elemento.hora_ida +'</td><td><button type="button" id="eliminar_viaje" class="btn btn-outline-dark" onclick="eliminar_servicio('+indice+');"> - QUITAR </button></td></tr>';
    });
    $("#tarifa").val(tarifa_total);
    $("#mostrar_precio").text( 'Tarifa: S/  ' + tarifa_total);
     
}
function eliminar_servicio(id) {
    datoViajes.splice(id,1);
    document.getElementById("cuerpo_tabla").innerHTML="";
    tarifa_total=0;
    cantida_viaje=0;
    datoViajes.forEach(function (elemento, indice, array) {
        tarifa_total = tarifa_total + elemento.tarifa;
        cantida_viaje = indice + 1 ;
        var fecha_convertida = elemento.fecha_ida.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
        document.getElementById("cuerpo_tabla").innerHTML+='<tr><th scope="row">'+ fecha_convertida +'</th><td>'+ elemento.hora_ida +'</td><td><button type="button" id="eliminar_viaje" class="btn btn-outline-dark" onclick="eliminar_servicio('+indice+');"> - QUITAR </button></td></tr>';
    });
    $("#tarifa").val( tarifa_total);
    $("#mostrar_precio").text( 'Tarifa: S/ ' + tarifa_total);
}

function culqi() {
    if (Culqi.token) { // ¡Objeto Token creado exitosamente!
        var token = Culqi.token.id;
        var email = Culqi.token.email;
        var dat = {
            producto:producto,
            precio:precio,
            description:descripcion,
            token:token,
            email:email
        }
        var url="index.php/traslado/pago_traslado";
        $.ajax({
            type:"post", 
            url:link+'pasarela/pago_traslado.php',
            data:{
                'producto': producto,
                'precio': precio,
                'descripcion': descripcion,
                'token': token,
                'email': email
            },
            success:function(data){
                var datos =JSON.parse(data);
                console.log(datos)
                if (datos.object == 'error') {
                    var typeMensaje= datos.object;
                    var user_message = datos.user_message;
                    type=false;
                    $("#titulo_mensaje").text(typeMensaje.toUpperCase()+'!')
                    $("#header_modal").css("background-color", "#ff5722");
                    $("#cuerpo_mensaje_modal").text(user_message);
                    $('#mensaje').show(700); //muestro mediante id
                }else{
                    guardarTraslado(datos);
                } 
            },
            error:function(jqXHR, textStatus, errorThrown){
            console.log('error:: '+ errorThrown);
            }
        });

        //alert('Se ha creado un token:' + token);
        //En esta linea de codigo debemos enviar el "Culqi.token.id"
        //hacia tu servidor con Ajax
    } else { // ¡Hubo algún problema!
        // Mostramos JSON de objeto error en consola
        console.log(Culqi.error);
        alert(Culqi.error.user_message);
    }
}

function guardarTraslado(data) {
   
    tarifa_total
    datoViajes
    var descripcion_culqi = data.description;
    var type_culqi = data.outcome.type;
    var mensaje_usuario_culqi = data.outcome.user_message;
    var debito_credito = data.source.iin.card_type;
    var tipo_tarjeta_culqi= data.source.iin.card_brand;
    var ultimo_four = data.source.last_four;

    console.log(descripcion_culqi,
        type_culqi,
        mensaje_usuario_culqi,
        debito_credito,
        tipo_tarjeta_culqi,
        ultimo_four)
    $.ajax({
        type:"post", 
        url:'index.php/traslado/guardar_traslado',
        data:{
            'full_nombre'        : full_nombre,
            'correo'             : correo,
            'tel_movil'          : tel_movil,
            'ubicacion_ida'      : ubicacion_ida, 
            'ubicacion_vuelta'   : ubicacion_vuelta, 
            'observacion'        : observacion, 
            'tarifa_total'       : tarifa_total,
            'ultimo_four'        : ultimo_four,
            'debito_credito'     : debito_credito,
            'tipo_tarjeta_culqi' : tipo_tarjeta_culqi ,
            'datoViajes'         : JSON.stringify(datoViajes),
           
        },
        success:function(data){
           
        },
        error:function(jqXHR, textStatus, errorThrown){
        console.log('error:: '+ errorThrown);
        }
    });

}


