<?php
session_start();

    require_once 'include/connection.php';
    require_once 'include/functions.php';

    $sql = "SELECT * FROM item";
    $results = mysqli_query($conn, $sql);
    
if (!isset($_SESSION['user_logged']))
 exit(header('Location: index.php'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenWay | Admin</title>
    <link rel="stylesheet" href="css/adminPg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>


<body>
  <nav class="header">
    <div class="container">
      <a class="logo" href="index.php"> <img src="img/logo1.png" alt="GreenWay's Logo" width="90px" height="70px"> </a>
      <a id="log" href="logout.php" class="btnn">Sign out</a>
    </div>
  </nav>

   <div class="addbtn">
    <a href="addItem.php" class="btnn">Add</a> 
</div>


<div class="photos">
<article class= "drinks">
  
        <div class="items_container">
    <?php foreach ($results as $result):

$id = $result['ID'];
$name = $result['name'];
$image = $result['image1'];
$itemNum = $result['Item_number'];
?>

  <div id="card<?= $id; ?>" class="card_items">
        <!--<div class="column">-->
        <!--  <div class="card">-->
            <img src="<?= $image; ?>" alt="<?= $name; ?>" class="imgstyles">
            <div class="container change_icons">
              <div class="left on_icon">
              <button class="btn"> <a href='editItem.php?item_number=<?= $itemNum; ?>'> <i class="fa fa-pencil" ></i></a></button>
              </div>
              <div class="middle on_icon">
              <button class="btn"> <a href='deleteItem.php?item_number=<?= $itemNum; ?>'><i class="fa fa-trash"></i></a></button>
              </div>
              <div class="right on_icon">
               <button class="btn"> <a href='reviews.php?product_id=<?= $itemNum; ?>'> <i class="fa fa-search" ></i></a></button>
              </div>
            </div>
        <!--  </div>-->
        <!--</div> -->
      </div>

    <?php endforeach; ?>
    </div>
   
  </article>
</div>




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





<script>
    function myFunction( x ) {
  var j = document.getElementById(x);
  if (j.style.display === "none") {
    j.style.display = "block";
  } else {
    j.style.display = "none";
  }
} 
</script>



</body>
</html>