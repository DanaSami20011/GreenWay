<!doctype html>
<html lang="en">
    
    <?php
    require_once('include/connection.php');
    include('include/functions.php');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $item_id = isset($_POST['ID']) ? $_POST['ID'] : '';
      $description = isset($_POST['description']) ? $_POST['description'] : '';
      $item_name = isset($_POST['name']) ? $_POST['name'] : '';
    
      //$next_id = getNextID("Request");
      $next_id = 1;
    
      $uploaded = true;
      $files = array_filter($_FILES['myfile']['name']); //Use something similar before processing files.
      // Count the number of uploaded files in array
      $total_count = count($_FILES['myfile']['name']);
      // Loop through every file
      for ($i = 0; $i < $total_count; $i++) {
        //The temp file path is obtained
        $tmpFilePath = $_FILES['myfile']['tmp_name'][$i];
        //A file path needs to be present
        if ($tmpFilePath != "") {
          if (!file_exists("./upload_files/" . $next_id)) {
            mkdir("./upload_files/" . $next_id, 0777, true);
          }
          //Setup our new file path
          $newFilePath = "./upload_files/" . $next_id . "/" . $_FILES['myfile']['name'][$i];
          //File is uploaded to temp dir
          if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            //Other code goes here
            $files[$i] = $newFilePath;
          } else {
            $uploaded = false;
            $error_msg = "Can not upload files";
          }
        }
      }
    
      if ($uploaded) {
        $item_id = addItem($item_id, $item_name, $description, $files);
        if ($item_id > 0) {
          header("location: adminPage.php?id=$item_id&msg=success");
          exit();
        }
      }
    }
    

?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>GreenWay | Add Item</title>
  </head>
  <body>

    <nav class="header">
      <div class="container1">
        <a class="logo" href="index.php"> <img src="img/logo1.png" alt="GreenWay's Logo" width="90px" height="70px"> </a>
        <a id="log" href="logout.php" class="btn">Sign out</a>
      </div>
    </nav>
  

  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-7">
          <div class="form h-100 contact-wrap p-5">
            <h3 id = "h3"class="text-center">ADD NEW ITEM</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">ID *</label>
                  <input type="text" class="form-control" name="ID" id="ID" placeholder="Item's ID">
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Name *</label>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Item's name">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Upload images *</label> <br>
                  <input type="file" id="myfile" name="myfile[]" class="form-control" multiple></input>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-md-12 form-group mb-3">
                  <label for="message" class="col-form-label">Description *</label>
                  <textarea class="form-control" name="description" id="description" cols="30" rows="4"  placeholder="Write the Item's description"></textarea>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-5 form-group text-center">
                    <input type="submit" value="Add item" class="buttonn"></input>
                  <span class="submitting"></span>
                </div>
              </div>
              
              <?php if ($success_msg) { ?>
                    <div class="success-msg"><?= $success_msg ?></div>
                <?php } else if ($error_msg) { ?>
                    <div class="error-msg"><?= $error_msg ?></div>
                <?php } ?>
            </form>



          </div>
        </div>
      </div>
    </div>

  </div>
    
    

   <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
   <!-- <script src ="https://cdn.jsdelivr.net/jquery.validation/1.13.1/additional-methods.min.js"></script>-->
    <script src="js/main.js"></script>
    



    <footer>
      <div class="footer-content">
          <h3>GreenWay</h3>
          <p>Best Place To Find Organic Items Reviews!
          </p>
          <ul class="socials">
              <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
          </ul>
      </div>
      <div class="footer-bottom">
          <p>©2022 GreenWay | Some Rights Reserved</p>
      </div>
  </footer>
        
  </body>
</html>