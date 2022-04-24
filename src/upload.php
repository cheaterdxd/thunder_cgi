<?php
$dir = './upload';
if (!file_exists($dir))
  mkdir($dir);

$error = '';
$success = '';

if (isset($_FILES["files"])) {
  try {
    //Count Files
    $files = $_FILES['files'];
    $count = count($files["name"]);
    
    // Not allow PHP exexcute file upload to website
    for ($i = 0; $i < $count; $i++) {
      $filename = $files["name"][$i];
      $extension = end(explode(".", $filename));
      if (in_array($extension, ["php", "phtml", "phar"])) {
        $error = 'Hack detected!';
        break;
      }
    }

    // If all right, save these file to user directory
    if ($error == '') {
      for ($i = 0; $i < $count; $i++) {
        $filename = $files["name"][$i];
        $newFile = $dir."/".$filename;
        move_uploaded_file($files["tmp_name"][$i], $newFile);
	header("Refresh:0");
      }
      $success = 'Successfully uploaded';
    }
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
}
?>
