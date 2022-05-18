<?php

    require_once 'include/connection.php';
    require_once 'include/functions.php';
    $search = @$_GET['search'];
    $search_query = '';
    $search_where = '';
    if (!empty($search)) {
        $search_query = "&search=".$search;
        $search_where = " WHERE name LIKE '%$search%'";
    }
    $order_by = (isset($_GET['order']) && !empty($_GET['order'])) ? $_GET['order'] : 'DESC';

    $sql = "SELECT Item_number, name, image1, avg_rate FROM item  $search_where ORDER BY avg_rate $order_by";
    $results = mysqli_query($conn, $sql);
    print_r($conn->error);
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GreenWay | Items</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/itemsStyle.css">
</head>

<body>
    <nav class="header">
        <div class="container">
            <a class="logo" href="index.php"> <img src="img/logo1.png" alt="GreenWay's Logo" width="90px"
                    height="70px"> </a>
            <a id="log" href="adminLogin.php" class="btn">Admin Login</a>

            <form method="get">
                <div class="input-wrapper">
                    <div class="fa fa-search"></div>
                    <input type="text" placeholder="Search for an item" value="<?=$search?>" name="search" />
                </div>
            </form>
        </div>
    </nav>

    <div class="dropdown">
        <button class="dropbtn">Sort items</button>
        <div class="dropdown-content">
          <a href="items.php?order=DESC<?=$search_query?>">Highest rate to lowest</a>
          <a href="items.php?order=ASC<?=$search_query?>">Lowest rate to highest</a>
        </div>
      </div>


    <div class="items">
        <div class="title">
            <h1>ITEMS</h1>
            <div class="underline"></div>
        </div>
        <div class="items-container">
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

</body>

</html>