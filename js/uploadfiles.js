$(document).ready(function (e) {
      photo();
    $("#form-upload").on('submit',(function(e) {
        $.ajax({
            url: "json/upload_files.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function()
            {
                //$("#preview").fadeOut();
                $("#err").fadeOut();
            },
            success: function(data)
            {
                if (data.hasOwnProperty('success')) {
                    if (data.success === true)
                    {
                        // view uploaded file.
                        if (data.hasOwnProperty('final_filename')) {
                            // $("#preview").html(data.final_filename).fadeIn();
                            $("#centre2")
                                .append(
                                    $('<img src="'+data.final_filename+'"/>')
                                        .css({
                                            'border': '0.5px solid black',
                                            'width': '480px',
                                            'height': 'auto'
                                        })//,
                                    // $('<button  class="deco" />')

                                ).fadeIn(1000);

                            // $("#form-upload")[0].reset();
                        }
                    }

                    else
                    {
                        // invalid file format.
                        $("#err").html("Invalid File !").fadeIn();
                    }
                } else {
                    $("#err").html('Erreur inattendue').fadeIn();
                }
            },
            error: function(e)
            {
                $("#err").html(e).fadeIn();
            }
        });
        return false;
    }));
});

function photo() {
    $.ajax({
        url : "../json/photo.php",
        method : "get"
    }).done(function (data) {
       console.log(data.message);
        if(data.success === true) {
            data.message.forEach(img => {
                $('#centre2')
                    .append(
                        $('<img/>')
                            .attr({
                                'src' : img + '.png',
                                'alt' : 'image numero ' + img
                            })
                    )
            })
        } else if (data.success === false) { // data.success === false
            $('#message').html(data.message).fadeIn().css("color","#FF0000");
        }
    }).fail(function () {
        $('body').html('Une erreur critique est arrivée.');
    });

}
