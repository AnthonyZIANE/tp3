<?php
require'../connexion.php';


session_start();

$obj = new stdClass();
$obj->success = false;
$obj->message = "test test";


$u = $_SESSION['user'];


$valid_extensions = array('jpg');

if($valid_extensions) {
    $target_dir = "../images/uploads/";
    $target_file = $target_dir . basename($_FILES["image_file"]["name"]);
    $tmp_name = $_FILES["image_file"]["tmp_name"];
    move_uploaded_file($tmp_name, $target_file);

    $obj->final_filename = $target_file;
    $obj->success = true;

    $sql = ("INSERT INTO uploading ( file_name, user_id) VALUES(:file_name, :user_id)");
    $req1 = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $req1->execute(array('file_name' => $target_file, 'user_id' => $u[0][0]));

}else{
    $obj->message = "Veuillez sélectionnez une image en JPG";
}


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);
