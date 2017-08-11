jQuery(document).ready(function($){

    contacto = {
        addEventListener: function(){

            $( 'input[type="submit"]' ).click( function(e) {
                return contacto.checkFields();
            });

        },
        checkFields: function(){

            var errorClass      = "mgtcontact__error";
            var txtnombre       = $('#txtnombre');
            var txtemail        = $('#txtemail');
            var txtcomentario   = $('#txtmensaje');
            var result          = true;

            // Remove all errors
            $('input, textarea').removeClass( errorClass );

            // Check empty fields
            if( $( txtnombre ).val() == "" ) $(txtnombre).addClass( errorClass );
            if( $( txtemail ).val() == "" ) $(txtemail ).addClass( errorClass );
            if( $( txtcomentario ).val() == "" ) $(txtcomentario ).addClass( errorClass );


            // Check Result
            if( $('input, textarea').hasClass( errorClass ) ) result = false;

            // Return
            return result;
        },
        init: function(){

            contacto.addEventListener();

        }
    };

    // Initialize the general object
    contacto.init();

});