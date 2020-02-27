(function () {
    'use strict';

    $(() => {
        // vérifier si la session est connectée
        $.ajax({
            url:'json/isconnected.php',
            method:'get'

        }).done(function (data) {
            if (data===true){
                // faire d'autres appels ajax pour afficher ce qu'on veut
                $('#message2').html(data.message).fadeIn().css("color","#F08226");
                $('.deco').append(
                    $('<button />')
                        .html('Déconnexion')
                        .click(function () {
                            $.ajax({
                                url: 'json/logout.php',
                                method : 'get'
                            }).done(function () {
                                window.location.href='/projet.html';

                            })
                        })
                )
            } else {
                window.location.href = '/index.html';
            }
        });
    });

}) ();
$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
