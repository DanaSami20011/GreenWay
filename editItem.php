<?php 
  
  require_once 'include/connection.php';
  require_once 'include/functions.php';
  
  $item = $_GET['item_number'];
  $sql = "SELECT * FROM item WHERE Item_number = '$item';";
  $result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) { 
  while($row = $result->fetch_assoc()){
  $ItemID = $row["Item_number"];
  $name = $row["name"];
  $ItemDes = $row["description"];
  $image1=$row['image1'];
  $image2=$row['image2'];

  }}
?>

<!doctype html>
<html lang="en">
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


    <title>GreenWay | Update Item</title>
  </head>
  <body>

    <nav class="header">
      <div class="container1">
        <a class="logo" href="index.php"> <img src="img/logo1.png" alt="GreenWay's Logo" width="90px" height="70px"> </a>
        <a id="log" href="logout.php" class="btnn">Sign out</a>
      </div>
    </nav>
  

  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-7">
          <div class="form h-100 contact-wrap p-5">
            <h3 class="text-center" id ="h3">UPDATE ITEM</h3>
            <form class="mb-5" method="post" enctype="multipart/form-data"  action="updateitem.php?id= <?php echo $ItemID; ?>&des=<?php echo $ItemDes; ?> &name=<?php echo $name; ?> " id="contactForm" name="contactForm">
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">ID *</label>
                  <input type="text" class="form-control" name="ID" id="ID"  value="<?php echo $ItemID; ?>" >
                
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Name *</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" >
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Upload images *</label> <br>
                  <img  src="<?php echo $image1; ?>"  alt="item image" width="140px" height="140px">
                <img  src="<?php echo $image2; ?>"  alt="item image" width="140px" height="140px">

                  <input type="file" id="myfile" name="myfile[]" multiple="multiple" >

                </div>
              </div>

              <div class="row mb-5">
                <div class="col-md-12 form-group mb-3">
                  <label for="message" class="col-form-label">Description *</label>
                  <textarea class="form-control" name="description" id="description" cols="30" rows="4"  value=""><?php echo $ItemDes; ?></textarea>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-5 form-group text-center">
                  <input type="submit" value="Update item" name ='submit'  class="buttonn"></input>
                  <span class="submitting"></span>
                </div>
              </div>
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
   <!------ <script src="js/main.js"></script> ---->

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