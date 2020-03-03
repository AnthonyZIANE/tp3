<?php
//DB details
$dbHost = 'mysql-anthonyziane.alwaysdata.net';
$dbUsername = '189623';
$dbPassword = 'voiture1313';
$dbName = 'anthonyziane_database';
//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}

?>