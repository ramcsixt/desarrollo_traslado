/** variables culqui */
Culqi.publicKey = 'pk_test_a489cb4976feb3ae';
var producto = 'Servicio de Traslado', precio = '', description='';

var paso = 1, paso1=0, paso2=0, paso3=0, paso4=0, val;
/** variables paso 1 */
var full_nombre, correo, tel_movil;

/** variables paso 2 */
var ubicacion_ida, ubicacion_vuelta, map;

/** variables paso 3 */
var nuevoViaje, tarifa, tarifa_total=0, cantida_viaje, fecha_ida, hora_ida, item, datoViajes = [];
/** mapas de google */
var map, lati = -12.1215386, lngi = -77.02976, lat1, lng1; 
var directionsDisplay = new google.maps.DirectionsRenderer({polylineOptions:{strokerColor:'#2E9AFE'}});
var directionsService = new google.maps.DirectionsService();

$(document).ready(function() {
    /*OCURTAMOS DIV DE LOS MENSAJE DE VALIDACION */
    $('#error_mensaje').hide(); //muestro mediante id
    cargar_mapa();
    
    $("#next").click(function () {
        if (paso == 1) {
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
        paso--;
        if (paso == 1) {
            $("#circle1").css("background-color", "rgb(255, 95, 0)");
            if (paso2==1) { $("#circle2").css("background-color", "#000000"); } else { $("#circle2").css("background-color", "#969696");}
            if (paso3==1) { $("#circle3").css("background-color", "#000000"); } else { $("#circle3").css("background-color", "#969696");}
            if (paso4==1) { $("#circle4").css("background-color", "#000000"); } else { $("#circle4").css("background-color", "#969696");}  
            $("#pagin").text('Paso 1 de 4'); 
            $('#rev').hide(700); //muestro mediante id
            $('#paso4').hide(700); //muestro mediante id
            $('#paso3').hide(700); //muestro mediante id
            $('#paso2').hide(700); //muestro mediante id
            $('#paso1').show(700); //muestro mediante id   
            $('#pagoEnvio').hide(1000); //muestro mediante id      
        }
        if (paso == 2) {
            $("#circle2").css("background-color", "rgb(255, 95, 0)");
            if (paso1==1) { $("#circle2").css("background-color", "#000000"); }
            if (paso3==1) { $("#circle3").css("background-color", "#000000"); } else { $("#circle3").css("background-color", "#969696");}
            if (paso4==1) { $("#circle4").css("background-color", "#000000"); } else { $("#circle4").css("background-color", "#969696");}     
            $("#pagin").text('Paso 2 de 4');
            $('#paso4').hide(700); //muestro mediante id
            $('#paso3').hide(700); //muestro mediante id
            $('#paso1').hide(700); //muestro mediante id
            $('#paso2').show(700); //muestro mediante id    
            $('#pagoEnvio').hide(1000); //muestro mediante id  
        }
        if (paso == 3) {

            $("#circle3").css("background-color", "rgb(255, 95, 0)");
            if (paso1==1) { $("#circle2").css("background-color", "#000000"); }
            if (paso3==1) { $("#circle3").css("background-color", "#000000"); }
            if (paso4==1) { $("#circle4").css("background-color", "#000000"); } else { $("#circle4").css("background-color", "#969696");}     
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
            $("#circle4").css("background-color", "rgb(255, 95, 0)");
            if (paso1==1) { $("#circle1").css("background-color", "#000000"); }
            if (paso3==1) { $("#circle2").css("background-color", "#000000"); }
            if (paso4==1) { $("#circle3").css("background-color", "#000000"); }    
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
        $('#pagoEnvio').show(1000); //muestro mediante id
    });
    $("#metodo_pago1").click(function(){
        $('#pagoEnvio').text('Pagar'); //muestro mediante id
        $('#pagoEnvio').show(1000); //muestro mediante id
    });
    /** Pagar trasporte 
     * var full_nombre = $("full_nombre").val();
       var correo = $("correo").val();
       var tel_movil = $("tel_movil").val();
       var ubicacion_ida = $("ubicacion_ida").val();
       var ubicacion_vuelta = $("ubicacion_vuelta").val();
       //var cantida_viaje = $("cantida_viaje").val();
       var observacion = $("observacion").val();
       var metodo_pago = $('input:radio[name="metodo_pago"]:checked').val();
       if(!$('input[name="metodo_pago"]').is(':checked')){var tipoPago = 0; }

        tarifa_total
        datoViajes
        if(correo == ""){
            val=false;
            $("#cuerpo_mensaje").text('Error! Ingrese Correo Valido');
            $('#error_mensaje').show(700); //muestro mediante id
            // $("#full_nombre").focus();
            return false;
        }    
    */
    $('#pagoEnvio').on('click', function(e) {

       
        precio = tarifa_total*100;
        descripcion = producto
        Culqi.settings({
            title: producto, 
            currency: 'PEN',
            description: descripcion,
            amount: precio
        });
        // Abre el formulario con la configuración en Culqi.settings
        Culqi.open();
        e.preventDefault();
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
    full_nombre = $("#full_nombre").val();
    console.log(full_nombre)
    correo      = $("#correo").val();
    tel_movil   = $("#tel_movil").val();   
    if(full_nombre == ""){
        val=false;
        $("#cuerpo_mensaje").text('Error! Ingrese Nombre');
        $('#error_mensaje').show(700); //muestro mediante id
        //$('#mensaje').show('slow');
    // $("#full_nombre").focus();
        return false;
    }    
    if(correo == ""){
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
            //$("#boton02").remove();
           // $("#circle1").append('<button  type="button" class="btn btn-circle" style="background-color: rgb(255, 95, 0); color:white">1</button>');
            $("#circle1").css("background-color", "#000000");
            $("#cheked").addClass("fa fa-check");
            $("#cheked").text("");
            $("#circle2").css("background-color", "rgb(255, 95, 0)");
            $("#pagin").text('Paso 2 de 4');
            $('#rev').show(700); //muestro mediante id
            $('#paso1').hide(700); //muestro mediante id
            $('#paso2').show(700); //muestro mediante id
        }
        
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
            $("#circle1").css("background-color", "#000000");
            $("#circle2").css("background-color", "#000000");
            $("#circle3").css("background-color", "rgb(255, 95, 0)");
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
            $("#circle1").css("background-color", "#000000");
            $("#circle2").css("background-color", "#000000");
            $("#circle3").css("background-color", "#000000");
            $('#rev').show(700); //muestro mediante id
            $("#circle4").css("background-color", "rgb(255, 95, 0)");
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
    var tarifa_item = (km*10);
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

function cargar_mapa() {
   
    var pos = {
        lat: -12.1214941,
        lng: -77.0463575
    };
    map = new google.maps.Map(document.getElementById('map'),{
        zoom: 17,
        center: pos
      });
}
function culqi() {
    var link = $("#url").val();
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
                //alert(data)
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

