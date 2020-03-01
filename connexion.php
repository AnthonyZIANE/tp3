<?php

$hote = 'mysql-anthonyziane.alwaysdata.net';
$base = 'anthonyziane_database';
$user = '189623';
$pass = 'voiture1313';
$co = mysqli_connect($hote, $user, $pass) or die(mysqli_connect_error());
$ret = mysqli_select_db($co, $base) or die (mysqli_connect_error());


?>