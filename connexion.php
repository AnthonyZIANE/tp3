<?php
//DB details
//$dbHost = 'mysql-anthonyziane.alwaysdata.net';
//$dbUsername = '189623';
//$dbPassword = 'voiture1313';
//$dbName = 'anthonyziane_database';
////Create connection and select DB
//$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
//
//if ($db->connect_error) {
//    die("Unable to connect database: " . $db->connect_error);
//}

$host = 'mysql-anthonyziane.alwaysdata.net';
$dbname = 'anthonyziane_database';
$username = '189623';
$password = 'voiture1313';

try {

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);



} catch (PDOException $e) {

    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());

}
