$(document).ready(function (e) {
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
                console.log("voiture");
                console.log(data.message);
                if (data.hasOwnProperty('success')) {
                    console.log("voiture222");
                    if (data.success === true)
                    {
                        console.log("voiture222333");
                        // view uploaded file.
                        if (data.hasOwnProperty('final_filename')) {
                        // $("#preview").html(data.final_filename).fadeIn();
                            console.log("voiture222333444");
                            $("#centre2")
                                .append(
                                $('<img />')
                                    .attr({'src': data.final_filename})
                                    .css({
                                        'border': '0.5px solid black',
                                        'width': '300px',
                                        'height': 'auto'
                                    })
                            ).fadeIn(1000);
                            $("#form-upload")[0].reset();
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