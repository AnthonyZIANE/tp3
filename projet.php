<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Sharing Photos</title>
    <link rel="stylesheet" href="IMG/style1.css">
    <link rel="icon" type="image/png" href="IMG/partage.png"/>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="test.js"></script>
    <script src="login.js"></script>
</head>
<body>
<?php
include ("transfert.php");
if ( isset($_FILES['fic']) )
{
    transfert();
}
?>
<div id="haut">
         <img class="photo1" src="/IMG/photo.png" alt="photo"/>
        <p class="share">Share your Photos !</p>
<!--        <div id="message2"></div>-->
        <img class="photo2" src="/IMG/photo2.png" alt="photo"/>
</div>
<div class="deco">
</div>
<p><a href="liste.php">Liste</a></p>
<div id="centre">
    <form class="form2" action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
        <input class="bouton2" type="file" name="lefichier" size=50>
        <input class="envoyer" type="submit" value="Envoyer" />

    </form>
</div>
<div id="centre2">
</div>
<div id="bas">
        <img class="logo1" src="/IMG/html.png" alt="logo"/>
        <img class="logo2" src="/IMG/css.png" alt="logo"/>
        <p class="toto">Anthony Ziane</p>
        <img class="logo3" src="/IMG/js.png" alt="logo"/>
        <img class="logo4" src="/IMG/jquery.png" alt="logo"/>
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
