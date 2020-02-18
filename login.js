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
                    window.location.href = 'index.html';
                } else { // data.success === false
                    $('#message').html(data.message).fadeIn().css("color","red");
                }
            }).fail(function () {
                $('body').html('Une erreur critique est arrivée.');
            });
            console.log("erreur");
            return false; // bloque envoi formulaire automatique
        });
    });
}) ();