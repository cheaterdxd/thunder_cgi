<?php 
$file_name = $_GET['filename'];
$file_path = './upload/' . $file_name;
$file_name = basename($file_path);
if (file_exists($file_path)) {
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=".$file_name);
    readfile($file_path);
}
else { // Image file not found
    echo " 404 Not Found";
}?>