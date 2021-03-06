<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Sharing Photos</title>
    <link rel="stylesheet" href="img/style1.css">
    <link rel="icon" type="image/png" href="img/partage.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/isconnected.js"></script>
    <script src="js/login.js"></script>
    <script src="js/uploadfiles.js"></script>
</head>
<body>

<div id="haut">
    <img class="photo1" src="/img/photo.png" alt="photo"/>
    <p class="share">Share your Photos !</p>
    <img class="photo2" src="/img/photo2.png" alt="photo"/>
</div>
<div class="deco">
</div>
<div id="centre">
    <form id="form-upload" action="json/upload_files.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
        <input class="bouton2" type="file" name="image_file" />
        <input class="envoyer" type="submit" value="Envoyer" name="send" />
        <span>Seul le format JPG est accepté !</span>
    </form>
    <div id = err>
    </div>
</div>
<div id="message3">
</div>
<div id="preview" style="display: none"></div>
<div id="centre2">
</div>
<div id="bas">
    <img class="logo1" src="/img/html.png" alt="logo"/>
    <img class="logo2" src="/img/css.png" alt="logo"/>
    <p class="toto">Anthony Ziane</p>
    <img class="logo3" src="/img/js.png" alt="logo"/>
    <img class="logo4" src="/img/jquery.png" alt="logo"/>
</div>

<script>
    $( ".bouton2" ).hover(function() {
        $( this ).fadeOut( 500, 'linear');
        $( this ).fadeIn( 500 ).stop();
    });
</script>
<script>
    $( ".photo1" ).hover(function() {
        $( this ).fadeToggle(3000);
    });
</script>
<script>
    $( ".photo2" ).hover(function() {
        $(this).fadeToggle(3000);
    });
</script>
<script>
    $( ".share" ).hover(function() {
        $(this).fadeToggle(2000);
    });
</script>
<script>
    $( ".toto" ).hover(function() {
        $(this).fadeTo(2000, 0.4);
    });
</script>
<script>
    $( ".logo1" ).hover(function() {
        $(this).fadeTo(2000, 0.4);
    });
</script>
<script>
    $( ".logo2" ).hover(function() {
        $(this).fadeTo(2000, 0.4);
    });
</script>
<script>
    $( ".logo3" ).hover(function() {
        $(this).fadeTo(2000, 0.4);
    });
</script>
<script>
    $( ".logo4" ).hover(function() {
        $(this).fadeTo(2000, 0.4);
    });
</script>
</body>
</html>
