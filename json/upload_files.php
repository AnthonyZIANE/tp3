<?php

$obj = new stdClass();
$obj->message = "Aucun fichier";
$obj->success = false;


$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'uploads/'; // upload directory
if (isset($_FILES['image_file']))
{
    $file = $_FILES['image_file'];
    $img = $file['name'];
    $tmp = $file['tmp_name'];
    $obj ->message = $_FILES["image"]["error"];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    // check's valid format
    if(in_array($ext, $valid_extensions))
    {
        $path = $path.strtolower($final_image);
        if(move_uploaded_file($tmp, $path))
        {
            //include database configuration file
            include_once 'connexion.php';
            //insert form data in the database
            $insert = $db->query(
//                "INSERT uploading (name, email, file_name) ".
//                "VALUES ('".$name."','".$email."','".$path."')"
                "INSERT uploading (file_name) VALUES ('".$path."')"
            );
            $obj ->message = "Réception ok";
            $obj ->success = true;
            //echo $insert?'ok':'err';
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
