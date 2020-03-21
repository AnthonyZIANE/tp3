(function() {
    'use strict';
    $(() => {
        $('.form-register').submit(function () {
            let self = $(this); // resout probleme de contexte de done
            $('#message1').fadeOut();
            $.ajax({
                url : $(this).attr('action'),
                method : $(this).attr('method'),
                data : $(this).serialize()
            }).done(function (data) {
                if(data.success === true) {
                    $('#message1').html(data.message).fadeIn().css("color","#23ff19");
                } else if (data.success === false) {// data.success === false
                    $('#message1').html(data.message).fadeIn().css("color","#FF0000");
                }
            }).fail(function () {
                $('body').html('Une erreur critique est arrivée.');
            });
            console.log("erreur");
            return false; // bloque envoi formulaire automatique
        });
    });
}) ();