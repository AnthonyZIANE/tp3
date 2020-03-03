<?php
require_once '../connexion.php';

$obj = new stdClass();
$obj->message = "Aucun fichier";
$obj->success = false;


$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'uploads/'; // upload directory

//<br />
//<b>Warning</b>:  move_uploaded_file(uploads/659920,ndrtÙ*t.png):
// failed to open stream: No such file or directory in
// <b>/home/anthonyziane/projet/json/upload_files.php</b> on line <b>25</b><br />
//<br />
//<b>Warning</b>:  move_uploaded_file(): Unable to move '/home/anthonyziane/admin/tmp/phpY4fwZm' to 'uploads/659920,ndrtÙ*t.png' in <b>/home/anthonyziane/projet/json/upload_files.php</b> on line <b>25</b><br />
if (isset($_FILES['image_file']))
{
    $file = $_FILES['image_file'];
    $img = $file['name'];
    $tmp = $file['tmp_name'];
    $obj ->message = $_FILES["image"]["error"];

    var_dump($file);
    var_dump($img);
    var_dump($tmp);
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
