<?php

require'../connexion.php';


session_start();


$obj = new stdClass();
$obj->message = "test";
$obj->success = false;


$sql = ("SELECT * FROM uploading WHERE user_id = :username");
$req = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$req->execute(array('username' => $_SESSION['user']));
if($req->rowCount())
{
    $obj->success = true;
    $id = $req->fetchAll();
    $obj->message = $id;
    $_SESSION['user'] = $id;


}else{

    $obj->message = "erreur test";

}


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);