<?php
error_reporting(0);
session_start();
require "upload.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Proofs Of Dead</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CyberJutsu</a>
    </div>
  </nav>

  <div class="container">

    <h1 class="text-danger pb-5 pt-5"> Upload your Proofs of Dead here far away your wife 3:> </h1>

    <form method="post" enctype="multipart/form-data">
      <div class="mb3">
        <input type="file" class="form-control" id="upFile" name="files[]" multiple>
      </div>
      <br>
      <div class="mb3">
        <button type="submit" class="btn btn-primary"> Upload </button>
      </div>
    </form>

    <span style="color: red"><?php echo $error; ?></span>
    <span style="color: green"><?php echo $success; ?></span>

    <div class="col-md-10 m-5">
      <div class="row py-4">
        <!-- Display file -->
        <?php
        $filesUpload = glob($dir . "/*");
        foreach ($filesUpload as $eachFile) {
          $name = (basename($eachFile));
        ?>
          <div class="col-lg-2">
            <div class="ht-tm-codeblock">
              <div class="ht-tm-element card bg-primary text-white mb-3 text-center">
                <img src="<?php
                          $end = end(explode(".", $name));
                          if (in_array($end, ["png", "jpg", "svg"])) {//if file is image, display it
                            echo $dir . "/" . $name;
                          } else {
                            print("icon/files.png");// else use icon instead
                          }
                          ?>" class="card-img-top" style='background-color:white'>
                <div class="card-body">
                  <div class="m-2 text-white"><?php echo $name; ?></div>
                  <a class="btn bg-dark text-white" href="download.php?filename=<?php echo $name; ?>">
                    <i class="fa fa-download"></i>
                    download
                  </a>
                </div>
              </div>
            </div>
          </div>
          <br>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
