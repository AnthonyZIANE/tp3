<?php

require'../connexion.php';


session_start();

$obj = new stdClass();
$obj->message = " ! Mauvais nom d'utilisateur ou mot de passe ! ";
$obj->success = false;


$username = $_POST['username'];
$password = $_POST['password'];

$req = mysqli_query($db,"SELECT username, password FROM user WHERE username ='$username' AND password ='$password'") or die("failed");
$row = mysqli_fetch_array($req);
if ($row['username'] == $username)
{
    $obj->success = true;
    $_SESSION['user'] = $row['username'];
}



header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);





//    $obj->success = true;
//    $_SESSION['user'] = 123;



//require_once '../connexion.php';
//session_start();
//
//$obj = new stdClass();
//$obj->success = false;
//$obj->message = "Couldn't log you in, please verify your credentials.";
//
//$db = new Database();
//$stmt = $db->pdo()->prepare(
//    "SELECT * " .
//    "FROM user " .
//    "WHERE username = ?");
//$stmt->execute([$_POST['username']]);
//
//foreach ($stmt as $row) {
//    if ($row['password'] == $_POST['password']) {
//        $obj->success = true;
//        $obj->message = "Welcome " . $_POST['username'] . " !";
//        $_SESSION['user'] = $_POST['username'];
//        $_SESSION['justLogged'] = true;
//        break;
//    }
//}
//
//header('Cache-Control: no-cache, must-revalidate');
//header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
//header('Content-type: application/json');
//
//echo json_encode($obj);






