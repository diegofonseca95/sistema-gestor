$(document).ready(function(){
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