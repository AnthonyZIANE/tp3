(function () {
    'use strict';

    $(() => {
       $('#login-form').submit(function(){
           $.ajax({
               url : $(this).attr('action'), //on peut aussi écrire 'json/login-php
               method : $(this).attr('method'),
               data: $(this).serialize(),

           }).done(function (data) {
               if (data.success==true)
               {
                   window.location.href = '/';
               } else{

               }

           }).fail(function () {
               $('body').html('Erreur fatale');

           });
           return false;
        });
    });

}) ();