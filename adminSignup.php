<?php

session_start();
require('include/connection.php');
include('include/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Email = isset($_POST['mail']) ? $_POST['mail'] : '';
    $Uname = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $SignUp = signup($Email, $Uname, $password);

    if ($SignUp) {
        $_SESSION['user_logged'] = "admin";
        exit(header('Location: adminPage.php'));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenWay | Admin SignUp</title>
    <link rel="stylesheet" href="css/SignupPg.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <nav class="header">
        <div class="container">
            <a class="logo" href="index.php"> <img src="img/logo1.png" alt="GreenWay's Logo" width="90px" height="70px"> </a>


        </div>
    </nav>

    <div class="center">
        <h1>ADMIN SIGNUP</h1>
        <div class="form">
            <form id="form" method="POST" action="adminSignup.php">

                <div class="txt_field">
                    <div class="input-control">
                        <label for="mail">Email</label>
                        <input id="mail" name="mail" type="text" required>
                        <div class="error"></div>
                    </div>
                </div>

                <div class="txt_field">
                    <div class="input-control">
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" required>
                        <div class="error"></div>
                    </div>
                </div>


                <div class="txt_field">
                    <div class="input-control">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" required>
                        <div class="error"></div>
                    </div>
                </div>

                <input class="button" type="submit" value="Sign Up" onclick=" validateInputs(); return false;">


                <?php if ($success_msg) { ?>
                    <div class="success-msg"><?= $success_msg ?></div>
                <?php } else if ($error_msg) { ?>
                    <div class="error-msg"><?= $error_msg ?></div>
                <?php } ?>
            </form>
        </div>
    </div>

    <script src="js/SignupScript.js"></script>


</body>

</html>