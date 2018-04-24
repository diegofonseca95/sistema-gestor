function Center(){
    var b = $('#register-box').height();
    var a = $(window).height();
    var m = (a - b) >> 1;
    if(m < 0) return;
    $('#register-box').offset(
        { top : m, left : 0 }
    );
}

$(document).ready(function(){
    $(window).resize(Center);
    Center();
    $('#register-form').validate({
        rules : {
            nombre : {
                required : true,
                spanishWords : true
            },
            paterno : {
                required : true,
                spanishWords : true
            },
            materno : {
                required : true,
                spanishWords : true
            },
            correo : {
                required : true,
                email : true
            },
            telefono : {
                required : true,
                mobileMX : true
            },
            contrasena : {
                required : true,
                minlength : 8
            }
        },
        messages : {
            nombre : {
                required : 'Ingresa tu nombre.',
                spanishWords : 'Ingresa caractéres válidos.'
            },
            paterno : {
                required : 'Ingresa tu apellido paterno.',
                spanishWords : 'Ingresa caractéres válidos.'
            },
            materno : {
                required : 'Ingresa tu apellido materno.',
                spanishWords : 'Ingresa caractéres válidos.'
            },
            correo : {
                required : 'Ingresa tu correo.',
                email : 'Ingresa un correo válido.'
            },
            telefono : {
                required : 'Ingresa tu número de teléfono.',
                mobileMX : 'Ingresa un número válido.'
            },
            contrasena : {
                required : 'Ingresa una contraseña.',
                minlength : 'Tu contraseña debe ser de al menos k-caractéres.'
            }
        },
        errorElement : 'div',
        errorPlacement : function(error, element){
            var placement = $(element).data('error');
            if(placement)
                $(placement).append(error);
            else
                error.insertAfter(element);
        },
        submitHandler : function(form){
            // TODO : Send input
        }
    });
});