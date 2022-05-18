<?php
  require_once 'include/connection.php';

  
  
  
$item_id = $_GET['id'];
$des = $_GET['des']; 
$name2 = $_GET['name']; 

if(isset($_POST['submit'])) {
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
            if (!file_exists("upload_files/" . $item_id)) {
                mkdir("upload_files/" . $item_id, 0777, true);
            }
            //Setup our new file path
            $newFilePath = "upload_files/" . $item_id . "/" . str_replace(' ', '_', $_FILES['myfile']['name'][$i]);
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



//$id2=$item_id; 
$name=$_POST['name'];
$description=$_POST['description'];
$attachment1 = isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '';
$attachment2 = isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '';
//$file2=$_FILES['file']['name'];

if ((empty($description)) && (empty($name)) ){

if(!empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (!empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name2' , image1 = '$attachment1' , image2 = '$attachment2' , description = '$des'   where item_number = '$item_id' ";
} 
else 
    if(!empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name2' , image1 = '$attachment1' , image2 = '$attachment2' , description = '$des'  where item_number = '$item_id' ";
} 

else 
    if(empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name2' , description = '$des'   where item_number = '$item_id' ";
} 
}

else if ((empty($description)) && (!empty($name)) ) {
if(!empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (!empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name' , image1 = '$attachment1' , image2 = '$attachment2' , description = '$des'   where item_number = '$item_id' ";
} 
else 
    if(!empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name' , image1 = '$attachment1' , image2 = '$attachment2' , description = '$des'  where item_number = '$item_id' ";
} 

else 
    if(empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name' , description = '$des'   where item_number = '$item_id' ";
}     
        
}
else if ((!empty($description)) && (empty($name)) ){
 if(!empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (!empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name2' , image1 = '$attachment1' , image2 = '$attachment2' , description = '$description'   where item_number = '$item_id' ";
} 
else 
    if(!empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name2' , image1 = '$attachment1' , image2 = '$attachment2' , description = '$description'  where item_number = '$item_id' ";
} 

else 
    if(empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name2' , description = '$description'   where item_number = '$item_id' ";
}    
    
    
}


else  
 if(!empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (!empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name' , image1 = '$attachment1' , image2 = '$attachment2', description = '$description'  where item_number = '$item_id' ";
} 
else 
    if(!empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name' , image1 = '$attachment1' , image2 = '$attachment2' , description = '$description'  where item_number = '$item_id' ";
} 

else 
    if(empty(isset($files[0]) ? mysqli_real_escape_string($conn, $files[0]) : '')  && (empty(isset($files[1]) ? mysqli_real_escape_string($conn, $files[1]) : '') ))//new image1 uploaded
{
$sqlipdate = "UPDATE item SET item_number = '$item_id' , name = '$name' , description = '$description'  where item_number = '$item_id' ";
}    


    

if ($conn->query($sqlipdate) === TRUE ) {
header("location: adminPage.php"); 
exit();
} 
else {
echo '<script>alert("Error in updating your request")</script>' . $conn->error;

}

    
    }
}

?>
