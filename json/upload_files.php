<?php
require'../connexion.php';

session_start();

$obj = new stdClass();
$obj->success = false;
$obj->message = "test test";


$u = $_SESSION['user'];



define('RACINE', dirname(dirname(__FILE__)));
define('UPLOAD',RACINE.DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR);
$name = $_FILES['image_file']['name'];
$target_dir = "images/uploads/";
$valid_extensions = array('jpg');


if($valid_extensions) {
    $tmp_name = $_FILES["image_file"]["tmp_name"];
    $name = basename($_FILES["image_file"]["name"]);
    $final_filename = UPLOAD . $name;
    move_uploaded_file($tmp_name, $final_filename);
//    $sql = ("INSERT INTO uploading (file_name, user_id) VALUES(:file_name, :user_id)");
//    $req1 = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
//    $req1->execute(array(':file_name' => $final_filename, ':user_id' => $u));
    $obj->final_filename = $final_filename;
    $obj->success = true;
}else{
    $obj->message = "Veuillez sélectionnez une image en JPG";
}





//    try {
//        $z = $bdd
//            -> prepare("INSERT INTO uploading VALUES (NULL, ?, ?)")
//            -> execute([
//                $u,
//                $name
//            ]);
//        $obj->data = $final_filename;
//        $obj -> success = true;
//        $obj -> successMsg [] =  $final_filename . " was successfully added to the database.";
//    } catch (mysqli_sql_exception $e) {
//        $obj -> errorMsg[] = $e -> getMessage();
//    }
//












//define('RACINE', dirname(dirname(__FILE__)));
//define('UPLOAD',RACINE.DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR);
//
//$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
//
//if (isset($_FILES['image_file']))
//{
//    $file = $_FILES['image_file'];
//    $img = $file['name'];
//    $tmp = $file['tmp_name'];
//    $obj ->message = $_FILES["image"]["error"];
//
//    // get uploaded file's extension
//    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
//    // can upload same image using rand function
//
//    // check's valid format
//    if(in_array($ext, $valid_extensions))
//    {
//        $path = UPLOAD . $img;
//        do {
//            $final_image = rand().$img;
//            $final_filename = $path . strtolower($final_image);
//        } while (file_exists($final_filename));
//
//        if(move_uploaded_file($tmp, $final_filename))
//        {
//                $sql = ("INSERT INTO uploading (file_name, user_id) VALUES(:file_name, :user_id)");
//                $req1 = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
//                $req1->execute(array('file_name' => $final_filename, 'user_id' => $_SESSION['user']));
//                $obj->message = "Réception ok";
//                $obj->success = true;
//                $obj->final_filename = 'images/uploads/'. $final_image;
//            } else {
//                $obj->message = "Erreur base de données ! ";
//            }
//
//    } else
//    {
//        $obj ->message = "Ce fichier n'est pas une image!";
//    }
//}
//









header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);
