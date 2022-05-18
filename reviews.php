<?php 

session_start();

?><html>
<?php require_once('include/connection.php');

$product_id = $_GET['product_id'];
if (empty($product_id)){
    die('Select Product ID');
}

$product = [];
$product_query = $conn->query("SELECT * FROM item WHERE `Item_number`='$product_id'");
if ($product_query->num_rows > 0){
    while ($row = $product_query->fetch_object()){
        $product = $row;
    }
} else {
    die('No Product Found');
}

$success_msg = '';
$error_msg = '';

if (!empty($_POST)) {
//    print_r($_POST);
//    die();
    $review_text = isset($_POST['review']) ? $_POST['review'] : '';
    $rate = isset($_POST['rate']) ? $_POST['rate'] : '';

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
            if (!file_exists("upload_files/" . $product_id)) {
                mkdir("upload_files/" . $product_id, 0777, true);
            }
            //Setup our new file path
            $newFilePath = "upload_files/" . $product_id . "/" . str_replace(' ', '_', $_FILES['myfile']['name'][$i]);
            //File is uploaded to temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                //Other code goes here
                $files[$i] = $newFilePath;
            } else {
                $uploaded = false;
                $error_msg = "Can not upload files.";
            }
        }
    }

    if ($uploaded) {
        $post_id = addPost($product_id, $review_text,$rate, $files);
        if ($post_id > 0) {
            $success_msg = 'Review Added';
        }
    }

}

function addPost($item_id, $review_text,$rate, $files)
{
    global $conn;
    global $error_msg;

    $item_id = mysqli_real_escape_string($conn, $item_id);
    $review_text = mysqli_real_escape_string($conn, $review_text);


    if (empty(trim($item_id)) || empty(trim($review_text))) {
        $error_msg = "Provide all requested data.";
        return false;
    }
    if ($files != null) {
        $attachment1 = mysqli_real_escape_string($conn, $files[0]);
        $attachment2 = mysqli_real_escape_string($conn, @$files[1]);
    }

    $sql = "INSERT INTO `review` (item_id, review_text,rate,  image1, image2) values ('$item_id', '$review_text','$rate', '$attachment1', '$attachment2');";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $insert_id =  mysqli_insert_id($conn);
        $avg = 0;
        $avg_query = $conn->query("SELECT AVG(rate) as avg FROM review WHERE item_id = '$item_id'");
        if ($avg_query->num_rows > 0){
            $avg = $avg_query->fetch_object()->avg;
        }
        $conn->query("UPDATE item SET avg_rate = '$avg' WHERE item_number = '$item_id'");
        return $insert_id;
    }

    $error_msg = "Error, Can not add Request.";
    return false;
}



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reviewsStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/jquery.ratings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Fav-icon------------------------------>
    <link rel="shortcut icon" href="images/fav-icon.png"/>
    <!--poppins-font-family------------------->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
    <!--using-Font-Awesome-------------------->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <style>
        pre {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #ccc;
            padding-left: 0;
            padding-right: 0;
            border-radius: 0;
            background: none;
        }

        .form-control:active,
        .form-control:focus {
            outline: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-color: #000;
        }

        .testimonial-heading {
            position: relative;
            bottom: 350px;
        }

        .rating {
            display: inline-block;
            position: relative;
            height: 50px;
            line-height: 50px;
            font-size: 50px;
        }

        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .rating label:last-child {
            position: static;
        }

        .rating label:nth-child(1) {
            z-index: 5;
        }

        .rating label:nth-child(2) {
            z-index: 4;
        }

        .rating label:nth-child(3) {
            z-index: 3;
        }

        .rating label:nth-child(4) {
            z-index: 2;
        }

        .rating label:nth-child(5) {
            z-index: 1;
        }

        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .rating label .icon {
            float: left;
            color: transparent;
              font-size: 30px;
            position: relative;
            bottom: 10px;

        }

        .rating label:last-child .icon {
            color: #000;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
            color: #FDDA0D;
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #FDDA0D;
        }
        .text {
    position: absolute;
    top: 2%;
    left: 35%;
    display: inline-block;
    line-height: normal;
vertical-align: middle;
border: 5px  ;
width: 450px; 
height: 400px; 
}
 .rate {
        position : relative;
        left: 0%; 
        bottom : 50px;
    }
 .stars {
        position : relative;
        left: 0%; 
    }
.image-link {
    display: block;
    width: 400px;
    height:400px;
    position: absolute;
    top: 70px;
   right: 70%;
}
.form3 {
    width: 350px;
    height: 450px;
    background: whitesmoke;
    margin-bottom: 5%;
    border-radius: 10px ;
    /*-webkit-box-shadow: 0 0px 20px 0 rgba(0, 0, 0, 0.2);*/
    margin: calc(40vh - 200px) auto;
    padding: 20px 30px ;
    max-width: calc(100vw - 40px);
    position: relative;
    left: 55%;
    bottom: 320px;
    /*border-bottom: 2px solid #95c369;*/
    background-color: #fff;
    box-shadow: 0.5px 0.5px 20px rgb(204, 204, 204);
}
    
  .center {
    margin: auto;
    border-top: 5px ;
    padding: 300px;
    background-color: #f2f6ef;
    position: relative;
    top: 50px;
  
    
}



    </style>


    <title> GreenWay| Reviews </title>
</head>
<body>

<nav class="header">
    <div class="container">
        <a class="logo" href="index.php"> <img src="img/logo1.png" alt="GreenWay's Logo" width="90px"
                                                height="70px"> </a>
      
      <?php if(isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == "admin") { 
     echo ' <a id="log" href="logout.php" class="btn">Sign out</a>';
        } else{
       echo '<a id="log" href="adminLogin.php" class="btn">Admin Login</a>' ;

               
     } ?>
    </div>
</nav>


    <div class="center">
<main>

        <div id="switcher-wrap">
            <a id="one" class="image-link" href="#" style="background: url(<?=$product->image1?>) no-repeat ;"><span> </span></a>
            <a id="two" class="image-link" href="#" style="background: url(<?=$product->image2?>) no-repeat;"><span></span></a>
        </div>
        <div class="text">

            <p>
            <h3>
                        <?=$product->name?>
            </h3>
            <div id="desc">
                    <hr>
     <b> Description </b>  <br> 
     <?=$product->description?> 
     <hr> <br>  <br>

           </div>
            </p>

            <div class="rate">
            <b>Average rate</b>
                <br>
                <br>
                <div  class="stars">
                    <span class="fa fa-star <?=round($product->avg_rate) >= 1 ? 'checked' : ''?>"></span>
                    <span class="fa fa-star <?=round($product->avg_rate) >= 2 ? 'checked' : ''?>"></span>
                    <span class="fa fa-star <?=round($product->avg_rate) >= 3 ? 'checked' : ''?>"></span>
                    <span class="fa fa-star <?=round($product->avg_rate) >= 4 ? 'checked' : ''?>"></span>
                    <span class="fa fa-star <?=round($product->avg_rate) >= 5 ? 'checked' : ''?>"></span>
                </div>
            </div>
        </div>

    <div id="ADMINHIDEFORM"  <?php if(isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == "admin"){?>style="display:none"<?php } ?>>
        
        <form class="form3" enctype="multipart/form-data" method="post" id="review_form">
            <h2>POST REVIEW</h2>
            <p type="Write your review:"><br>
                <textarea class="form-control" id="review" rows="4" cols="44" name="review"
                          placeholder="Your review should be at most 300 characters "></textarea>

            </p>
            <p class="form-control" type="Upload at most 2 files"><input type="file" id="myfile" name="myfile[]"
                                                                         multiple accept="image/*"></p>


            <div>
                <p class="form-control" type="Rate:">
                <input type="hidden" name="rate" id="rate">
                <div class="rating">
                    <label>
                        <input type="radio" name="stars" value="1"/>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="2"/>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="3"/>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="4"/>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="5"/>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                </div>


            </div>

            <button type="button" class="buttonn" onclick="form_submit()"> Submit</button>
            <?php if ($success_msg) { ?>
                <div class="success-msg"><?= $success_msg ?></div>
            <?php } else if ($error_msg) { ?>
                <div class="error-msg"><?= $error_msg ?></div>
            <?php } ?>


        </form>
        
    </div>
    
        <!--heading--->
        
        <div id='rev' <?php if(isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == "admin"){?>style=" margin-top: 500px;"<?php } ?>>
        
        <div class="testimonial-heading">
            <span>REVIEWS</span>
            <h1>How others feel about this item</h1>
        </div>

        <!--Testimonials------------------->
        <?php
        $sql = "SELECT * FROM review WHERE item_id = '$product_id' ";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {//1
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($result as $key => $row) {
                    $review_text = $row["review_text"];
                    $image1 = $row['image1'];
                    $image2 = $row['image2'];
                    $rate = $row['rate'];


                    ?>
                    <section id="testimonials">

                        <!--testimonials-box-container------>
                        <div class="testimonial-box-container">
                            <!--BOX-1-------------->
                            <div class="testimonial-box">
                                <!--top------------------------->
                                <div class="box-top">
                                    <!--profile----->
                                    <div class="profile">
                                        <!--img---->
                                        <div class="profile-img">
                                            <img src="img/profile.jpg"/>
                                        </div>
                                        <!--name-and-username-->
                                        <div class="name-user">
                                            <strong>Anonymous</strong>
                                        </div>
                                    </div>
                                    <!--reviews------>
                                    <div class="reviews">
                                        <?php for ($i = 1;$i <= 5; $i++) {?>
                                        <i class="<?=$rate >= $i ? 'fas' : 'far'?> fa-star"></i>
                                        <?php } ?>
                                        <!--Empty star-->
                                    </div>
                                </div>
                                <!--Comments---------------------------------------->
                                <div class="client-comment">
                                    <p> <?php echo $review_text; ?></p>
                                    <?php echo $image1 ? " <img src='" . $image1 . "'  width='100' height='100'> " : '' ?>
                                    <?php echo $image2 ? " <img src='" . $image2 . "'  width='100' height='100'> " : '' ?>
                                </div>
                            </div>


                        </div>
                    </section>
                    <?php
                }
            }
        } ?>


    </div>
        
    </div>
</main>


<footer>
    <div class="footer-content">
        <h3>GreenWay</h3>
        <p>
            Best Place To Find Organic Items Reviews!
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src="js/jquery.ratings.js"></script>
<script src="js/jquery.ratings.demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>
<script>
    function form_submit() {
        var review = $('#review').val();
        var file_count = $('#myfile')[0].files.length;
        var rate = $('#rate').val();

        if (!review){
            alert('Please Input Review');
        }else if (file_count < 1){
            alert('Please select minimum 1 images')
        } else if (rate < 1){
            alert('Please insert rate')
        } else {
            $('#review_form').submit();
        }
    }

    $('#review').on('keyup', function () {
        if ($(this).val().length > 300) {
            $(this).val($(this).val().substr(0, 300))
        }
    })

    $('#myfile').on('change', function () {
        var count = $(this)[0].files.length;
        if (count > 2) {
            $(this).val('')
            alert(`You can upload upto 2 images. you selected ${count} images`);
        }
    });
    $(':radio').change(function() {
        $('#rate').val(this.value);
    });
</script>
</html>
