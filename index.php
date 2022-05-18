<?php
    require_once 'include/connection.php';
    require_once 'include/functions.php';

    $sql = "SELECT Item_number, name, image1, avg_rate FROM item LIMIT 3";
    $results = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenWay | Home Page</title>
        <link rel="stylesheet" href="css/indexStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
    <nav class="header">
        <div class="container">
          <a class="logo" href="index.php"> <img src="img/logo1.png" alt="GreenWay's Logo" width="90px" height="70px"> </a>
                  <a id="log" href="adminLogin.php" class="btn">Admin Login</a>
        </div>
      </nav>

      	
<!-- BANNER  START------------------------------------------------------------>
	<div class="banner-area">
		<div class="banner">
			<div class="text-area">
				<h1>Great Place<br>To Find Organic Items <span>Reviews</span></h1>
        <br>
				<p> <span>GreenWay</span> is where you can Share your experiences by reviewing items and view others' reviews! </p>
			</div>
			<div class="imgbox">
				<img id="img1" src="img/review.png" alt="banner review">
        <br>
        <img id="img2" src="img/stars.png" alt="banner stars">

			</div>
		</div>

  <div class="items">
  <div class="title">
     <h1>ITEMS</h1> 
    <div class="underline"></div>
  </div>
  <div class="items-container" >
  <?php
        foreach($results as $result):
            $itemNum = $result['Item_number'];
            $name    = $result['name'];
            $image   = $result['image1'];
            $rate    = $result['avg_rate'];
      ?>
      
      <div class="t-box">
            <h2 class="name"><?= $name; ?></h2>
            <div class="rating">
                <?= str_repeat('<p><i class="fa-solid fa-star"></i></p>', $rate); ?>
                <pre> <?= $rate; ?></pre>
            </div>
            <img src="<?= $image; ?>" class="imgs" alt="item image">

            <button class="btn"><a id="bb" href="reviews.php?product_id=<?= $itemNum; ?>">Reviews</a></button>
        </div>

      <?php endforeach; ?>
  </div>

  <a id="more" href="items.php" class="btn">View all items</a>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>