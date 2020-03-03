<?php
require'../connexion.php';

$obj = new stdClass();
$obj->message = "Aucun fichier";
$obj->success = false;
//define('WWW_ROOT',dirname(dirname(__FILE__)));
//$directory = basename(WWW_ROOT);
//$url = explode($directory,$_SERVER['REQUEST_URI']);
//if(count($url) == 1)
//{
//    define('WEBROOT','/');
//}
//else
//{
//    define('WEBROOT', $url[0] .'/');
//}

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions

if (isset($_FILES['image_file']))
{
    $file = $_FILES['image_file'];
    $img = $file['name'];
    $tmp = $file['tmp_name'];
    $obj ->message = $_FILES["image"]["error"];

    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function

    // check's valid format
    if(in_array($ext, $valid_extensions))
    {
        $path = WEBROOT."img/upload/";
//        @mkdir($path, 0777, true);
        do {
            $final_image = rand().$img;
            $final_filename = $path . strtolower($final_image);
        } while (file_exists($final_filename));




        $name = 'test1';
        $email = 'test@test.cc';
        $db->query(
            "INSERT uploading (name, email, file_name) ".
            "VALUES ('".$name."','".$email."','".$final_filename."')"
        );









        if(move_uploaded_file($tmp, $final_filename))
        {
            //include database configuration file
            //insert form data in the database
            $name = 'test';
            $email = 'test@test.cc';
            if ($db->query(
                "INSERT uploading (name, email, file_name) ".
                "VALUES ('".$name."','".$email."','".$final_filename."')"
            )) {
                $obj->message = "Réception ok";
                $obj->success = true;
                $obj->final_filename = '/uploads/'. $final_image;
            } else {
                $obj->message = "Erreur base de données ! ".mysqli_error($db);
            }
        }
    }
    else
    {
        $obj ->message = "Ce fichier n'est pas une image!";
    }
}


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);
