<?php

//require ('../models/autos.php');
        //$target_dir = "../images/";
//$target_file = $target_dir . basename($_FILES["vehicle_image"]["name"]);
$target_files = $_FILES["tree_image"]["name"];
$imagetmp = addslashes(file_get_contents($_FILES['tree_image']['tmp_name']));
//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
insert_tree_image($target_files);
        $upload_tree_Ok = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
    $check_tree = getimagesize($_FILES["tree_image"]["tmp_name"]);
    
    
    if($check_tree !== false ) {
        
        echo "File is an image - " . $check_tree["mime"] . ".";
        $upload_tree_Ok = 1;
        echo 'taget file: ' .$target_file;
        
         
    } else {
        echo "File is not an image.";
        $upload_tree_Ok = 0;
        
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $upload_tree_Ok = 0;
    #echo 'Your file already exists';
    include_once '../errors/error_exists.php';
    
}



// Check file size
if ($_FILES["tree_image"]["size"] > 5000000) {
    $upload_tree_Ok = 0;
    include_once '../error/error_large.php';
    
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $image_FileType != "PNG" || $imageFileType == NULL ) {
    $upload_tree_Ok = 0;
    
    #echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
    include_once '../errors/error_filetype.php';
    
}


// Check if $uploadOk is set to 0 by an error
if ($upload_tree_Ok == 0 ) {
    echo "Sorry, your file was not uploaded.";
    
// if everything is ok, try to upload file
} if ($upload_tree_Ok == 1 ) {
(move_uploaded_file($_FILES["tree_image"]["tmp_name"],$target_file));
         #echo 'The file ' .  basename($_FILES["vehicle_image"]["name"]. ' has been uploaded');
         $alert_text = basename($_FILES["tree_image"]["name"]);
      echo"<script type='text/javascript'>alert('The File ' . $alert_text . ' has been uploaded');</script>";
      include ('view_trees.php');
    }  else {
        echo 'Sorry there was an error uploading your file';
    }
    


/*function add_leaf(){
//require ('../models/autos.php');
        //$target_dir = "../images/";
//$target_file = $target_dir . basename($_FILES["vehicle_image"]["name"]);
$target_files_1 = $_FILES["tree_leaf_image"]["name"];
$imagetmp = addslashes(file_get_contents($_FILES['tree_leaf_image']['tmp_name']));
//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
insert_leaf_image($target_files_1);
        $upload_leaf_Ok = 1;
$imageFileType = pathinfo($target_file_1, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
    $check_leaf = getimagesize($_FILES["tree_leaf_image"]["tmp_name"]);
    
    
    if($check_leaf !== false ) {
        
        echo "File is an image - " . $check_leaf["mime"] . ".";
        $upload_leaf_Ok = 1;
        echo 'taget file: ' .$target_file_1;
        
         
    } else {
        echo "File is not an image.";
        $upload_leaf_Ok = 0;
        
    }
}
// Check if file already exists
if (file_exists($target_file_1)) {
    $upload_leaf_Ok = 0;
    #echo 'Your file already exists';
    include_once '../errors/error_exists.php';
    
}



// Check file size
if ($_FILES["tree_image"]["size"] > 5000000) {
    $upload_leaf_Ok = 0;
    include_once '../error/error_large.php';
    
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $image_FileType != "PNG" || $imageFileType == NULL ) {
    $upload_leaf_Ok = 0;
    
    #echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
    include_once '../errors/error_filetype.php';
    
}


// Check if $uploadOk is set to 0 by an error
if ($upload_leaf_Ok == 0 ) {
    echo "Sorry, your file was not uploaded.";
    
// if everything is ok, try to upload file
} if ($upload_leaf_Ok == 1 ) {
(move_uploaded_file($_FILES["tree_leaf_image"]["tmp_name"],$target_file_1));
         #echo 'The file ' .  basename($_FILES["vehicle_image"]["name"]. ' has been uploaded');
      include_once("../errors/success.php");
    }  else {
        echo 'Sorry there was an error uploading your file';
    }
    }





























/*$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}*/
?>