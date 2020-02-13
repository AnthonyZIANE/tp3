(function () {
    'use strict';

    $(() => {
        // vérifier si la session est connectée
       $('#login-form').submit(function(){
           $('#message').fadeOut();
           $.ajax({
               url : $(this).attr('action'), //on peut aussi écrire 'json/login-php'
               method : $(this).attr('method'),
               data: $(this).serialize(),

           }).done(function (data) {
               if (data.success==true)
               {
                   window.location.href = '/';
               } else{
                   $('#message')
                       .html(data.message)
                       .fadeIn();

               }

           }).fail(function () {
               $('body').html('Erreur fatale');

           });
           return false;
        });
    });

}) ();