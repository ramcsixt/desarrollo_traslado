/** variables del formulario  */
var correo, password;
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$("#btn_validar").click(function () {
    //var csrf_test_name = $("input[name=csrf_test_name]").val();
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    password 	   = $("#password").val();
    var val 		   = true;
    if (regex.test($('#correo').val().trim())) {
        correo 	   = $("#correo").val();
    } else {
        toastr.error("Correo es invalido","Aviso!");
        val=false;
        return false;
    } 
    if (password == "") {
        toastr.error("Por favor Ingrese Contraseña","Aviso!");
        val=false;
    } 
    if (val) {
        $.ajax({
            data: { 
                   'usuario': correo,
                    'clave' : password,
           	},
            url:   'index.php/login/validar_acceso',
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
});
