(function() {
    'use strict';
    $(() => {
        $('.form-login').submit(function () {
            let self = $(this); // resout probleme de contexte de done
            $('#message').fadeOut();
            $.ajax({
                url : $(this).attr('action'),
                method : $(this).attr('method'),
                data : $(this).serialize()
            }).done(function (data) {
                if(data.success === true) {
                    window.location.href = '../projet.php';
                } else if (data.success === false) { // data.success === false
                    $('#message').html(data.message).fadeIn().css("color","#FF0000");
                }
            }).fail(function () {
                $('body').html('Une erreur critique est arrivée.');
            });
            return false; // bloque envoi formulaire automatique
        });
    });
}) ();