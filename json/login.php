<?php

require'../connexion.php';

session_start();
$obj = new stdClass();
$obj->message = " ! Mauvais nom d'utilisateur ou mot de passe ! ";
$obj->success = false;

$u = $_POST['username'];
$p = $_POST['password'];

if(!empty(trim($u)) && !empty(trim($p)))
{

  $sql = ("SELECT * FROM user WHERE username = :username AND password = :password");
  $req = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $req->execute(array('username' => $u, 'password' => $p));
  if($req->rowCount())
  {
      $obj->success = true;
      $id = $req->fetchAll();
      $obj->message = $id;
      $_SESSION['user'] = $id;

  }

}else{

    $obj->message = "Merci de remplir tout les champs";

}




header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);











