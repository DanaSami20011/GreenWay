<?php

//SIGNUP

function signup($Email, $Uname, $password)
{
    global $conn;
    global $error_msg;

    if (isUsernameExists($Uname, $conn)) {
        $error_msg = "Username already exists";
        return false;
    }

    if (isEmailExists($Email, $conn)) {
        
        $error_msg = "Email already exists";
        return false;
    }

    $Email = mysqli_real_escape_string($conn, $Email);
    $Uname = mysqli_real_escape_string($conn, $Uname);
    $password = mysqli_real_escape_string($conn, $password);
    $hashed_password = encryptPassword($password);

    $sql = "INSERT INTO admin (username , password, email) VALUES ('$Uname', '$hashed_password', '$Email')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_insert_id($conn);
    }

    $error_msg = "Error, Can not add an Admin";
    return false;
}


function isUsernameExists($username, $conn)
{
    $sql = "SELECT * FROM admin WHERE username ='$username'; ";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0)
        return true;
    
    return false;
}


function isEmailExists($email, $conn)
{
    $sql = "SELECT * FROM admin WHERE email ='$email'; ";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0)
        return true;
    
    return false;
}


function encryptPassword($password)
{
    $options = [
        'cost' => 12,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}



// LOGIN

function login($Uname, $password)
{
    global $conn;
    global $error_msg;

    $Uname = mysqli_real_escape_string($conn, $Uname);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM admin WHERE username = '$Uname';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if (isUsernameExists($Uname, $conn)) {
        if (password_verify($password, $user['password'])) {
            return $user['id'];
        } else {
            $error_msg = "Username or password is incorrect";
            return false;
        }
    } else {
        $error_msg = "Username doesn't exists, sign Up first";
        return false;
    }
}
else {
    $error_msg = "Error, Can not login.";
    return false;
    }
}


// ADD ITEM

function addItem($item_id, $item_name, $description, $files)
{
    global $conn;
    global $error_msg;

    $item_id = mysqli_real_escape_string($conn, $item_id);
    $item_name = mysqli_real_escape_string($conn, $item_name);
    $description = mysqli_real_escape_string($conn, $description);
    $avg_rate = 0; //initially no rates
    

    if (empty(trim($item_id)) || empty(trim($item_name)) || empty(trim($description))) {
        $error_msg = "Please provide all the requested information";
        return false;
    }

    if ($files == null) {
        $error_msg = "Please provide at least one image of the item";
        return false;
    }

    $sql = "SELECT * FROM item WHERE Item_number ='$item_id'; ";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $error_msg = "The entered item ID is already exists";
        return false;
    } else {
    if ($files != null) {
        $image1 = mysqli_real_escape_string($conn, $files[0]);
        $image2 = mysqli_real_escape_string($conn, $files[1]);
    }

    $sql = "INSERT INTO `item` (item_number, name, image1, image2, description, avg_rate) values ('$item_id', '$item_name', '$image1', '$image2', '$description' , '$avg_rate');";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_insert_id($conn);
    }
}

    $error_msg = "Error, can not add the item";
    return false;
}

// DELETE ITEM

function delItem($itemNum) 
{
    global $conn;

    $sql = "DELETE FROM item WHERE Item_number = '$itemNum';";
    $result = mysqli_query($conn, $sql);
    
    return $result;
}
