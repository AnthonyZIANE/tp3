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
                if (data.hasOwnProperty('success')) {
                    if (data.success)
                    {
                        // view uploaded file.
                        if (data.hasOwnProperty('final_filename')) {
                            $("#preview").html(data.final_filename).fadeIn();
                            $("#form")[0].reset();
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