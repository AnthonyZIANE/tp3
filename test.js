// (function () {
//     'use strict';
//
//     $(() => {
//         // vérifier si la session est connectée
//         $.ajax({
//            url:'json/isconnected.php',
//            method:'get'
//
//         }).done(function (data) {
//            if (data===true){
//                // faire d'autres appels ajax pour afficher ce qu'on veut
//                $('body').append(
//                    $('<button />')
//                        .html('Déconnexion')
//                        .click(function () {
//                            $.ajax({
//                                url: 'json/logout.php',
//                                method : 'get'
//                            }).done(function () {
//                                window.location.href='/login.html';
//
//                            })
//                        })
//                )
//            } else {
//                window.location.href = '/login.html';
//            }
//         });
//        $('#login-form').submit(function(){
//            $('#message').fadeOut();
//            $.ajax({
//                url : $(this).attr('action'), //on peut aussi écrire 'json/login-php'
//                method : $(this).attr('method'),
//                data: $(this).serialize(),
//
//            }).done(function (data) {
//                if (data.success==true)
//                {
//                    window.location.href = '/';
//                } else{
//                    $('#message')
//                        .html(data.message)
//                        .fadeIn();
//
//                }
//
//            }).fail(function () {
//                $('body').html('Erreur fatale');
//
//            });
//            return false;
//         });
//     });
//
// }) ();
$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});