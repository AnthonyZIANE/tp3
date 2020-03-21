<?php

require'../connexion.php';


session_start();


$obj = new stdClass();
//$obj->message = "test";
$obj->success = false;
$aa = $_SESSION['user'];

$sql = ("SELECT * FROM uploading WHERE user_id = :user_id");
$req = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$req->execute(array('user_id' => $aa[0][0]));
$obj->success = true;
$obj->message = $aa;
$obj->images = $req->fetchAll();




header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);