<html>
<head>
    <title>Stock d'images</title>
</head>
<body>
<?php
include ("connexion.php");
$req = "SELECT img_nom, img_id " .
    "FROM images ORDER BY img_nom";
$ret = mysqli_query ($co, $req) or die (mysqli_connect_error ());
?>
</body>
</html>