<?php
if (empty($_FILES['file'])) {
    exit();
}
$errorImgFile = "admin/img/img_upload_error.jpg";
$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$destinationFilePath = 'admin/img-uploads/'.$newfilename ;
if (!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)) {
    echo $errorImgFile;
} else {
    echo $destinationFilePath;
}
