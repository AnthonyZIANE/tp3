
<?php

require'../connexion.php';

$obj = new stdClass();
$obj->message = " ! Vous voilà inscrit ! ";
$obj->success = false;

$u = $_POST['username1'];
$p = $_POST['password1'];
$p2 = $_POST['password2'];

if(!empty(trim($u)) && !empty(trim($p)))
{
    $sql = ("SELECT username FROM user WHERE username = :username");
    $req = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $req->execute(array('username' => $u));
    if($req->rowCount())
    {
        $obj->message =  "Identifiant déjà utilisé !";

    }elseif(!preg_match("#^[a-z0-9]+$#",$u))
    {
        $obj->message = "Veuillez ne pas utiliser de caractères spéciaux !";

    }elseif(!preg_match("#^[a-z0-9]+$#",$p))
    {
        $obj->message = "Veuillez ne pas utiliser de caractères spéciaux !";

    }elseif(strlen($u)>10)
    {
        $obj->message = "L'identifiant comporte plus de 10 caractères !";

    }elseif (strlen($p)>10)
    {
        $obj->message = "Le mot de passe comporte plus de 10 caractères !";

    }elseif($p !== $p2)
    {
        $obj->message = "Veuillez saisir le même mot de passe !";

    }else
    {
        $sql = ("INSERT INTO user (username, password) VALUES(:username, :password)");
        $req1 = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $req1->execute(array('username' => $u, 'password' => $p));
        $obj->success = true;
    }

}else{

    $obj->message = "Merci de remplir tout les champs";

}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);







