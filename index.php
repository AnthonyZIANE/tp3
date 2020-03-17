<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="img/style1.css">
    <link rel="icon" type="image/png" href="img/partage.png"/>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/inscription.js"></script>
</head>
<body>
<div class="login-page">
    <div class="form">
        <form class="form-login" action="json/login.php" method="post" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Identifiant" id="a1"/>
            <input type="password" name="password" placeholder="Mot de passe" id="a2"/>
            <button name="connect" id="connecter" type="submit">Se connecter</button>

        </form>
    </div>
</div>
<div id="message">
</div>
<div id="message1">
</div>
<div class="register">
    <div class="form">
        <form class="form-register" action="json/inscription.php" method="post" enctype="multipart/form-data">
            <input type="text" name="username1" id="b1" placeholder="Identifiant"/>
            <input type="password" name="password1" id ="b2" placeholder="Mot de passe"/>
            <input type="password" name="password2" id ="b3" placeholder="Veuillez resaisir le mot de passe"/>
            <button name="inscr" id="inscrire" type="submit">S'inscrire</button>
        </form>
    </div>
</div>

<script>
    $( ".form button" ).hover(function() {
        $( this ).fadeOut(500);
        $( this ).fadeIn(500).stop();

    });
</script>

<script type="text/javascript">
    $(function () {

        $("#connecter").click(function () {
            z = true;
            if ($("#a1").val() == "")
            {
                $("#a1").css("border-color", "#FF0000");
                z = false;
            }
            if ($("#a2").val() == "")
            {
                $("#a2").css("border-color", "#FF0000");
                z = false;
            }
            return z;
        });

    });
</script>
<script type="text/javascript">
    $(function () {

        $("#inscrire").click(function () {
            z = true;
            if ($("#b1").val() == "")
            {
                $("#b1").css("border-color", "#FF0000");
                z = false;
            }
            if ($("#b2").val() == "")
            {
                $("#b2").css("border-color", "#FF0000");
                z = false;
            }
            if ($("#b3").val() == "")
            {
                $("#b3").css("border-color", "#FF0000");
                z = false;
            }
                return z;
        });

    });
</script>
</body>
</html>

