function Center(){
    var b = $('#login-box').height();
    var a = $(window).height();
    var m = (a - b) >> 1;
    if(m < 0) return;
    $('#login-box').offset(
        { top : m, left : 0 }
    );
}

$(document).ready(function(){
    var instance = M.Modal.init(
        document.querySelector('.modal')
    );
    $(window).resize(Center);
    Center();
    $('#login-form').validate({
        rules : {
            userId : {
                required: true,
                email : true
            },
            password : {
                required: true,
                minlength: 8
            }
        },
        messages : {
            userId : {
                required : 'Ingresa tu usuario.',
                email : 'Ingresa un usuario válido.'
            },
            password : {
                required : 'Ingresa tu contraseña',
                minlength : 'La contraseña es muy corta.'
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
    $('#forgot-form').validate({
        rules : {
            userId : {
                required : true,
                email : true
            }
        },
        messages : {
            userId : {
                required : 'Ingresa tu usuario.',
                email : 'Ingresa un usuario válido.'
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
