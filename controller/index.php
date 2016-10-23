<?php

require ('../models/database.php');
require ('../models/trees.php');


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'upload';
    }
}    


if ($action == "get_trees") {
    $trees = get_trees($tree_name, $tree_genus, $tree_description, $tree_image);

    include ('view_trees.php');
}else if(action == 'upload1'){
    echo 'hello yall';
    include 'file_upload.php';
}
else if(action == 'add_user'){
    echo 'hello from add car <br>';
    $name = filter_input(INPUT_POST, 'name');
    $year = filter_input(INPUT_POST, 'year');
    echo 'year: ' .$year;
    if ($name == NULL || $year == NULL || $year == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
    get_add_autos($name, $year);
        echo 'hello from autos else <br>';
        header("Location: .");
    }
    #$add_autos = get_add_autos($category_id, $name, $year);
    echo 'hello end add cars <br>';
    #include 'file_upload.php';
}elseif (action == 'add_tree') {
    $add_tree = get_add_tree($tree_name, $tree_genre, $tree_image, $tree_leaf_image, $tree_description, $tree_id);
    $users = get_user_id($users_id);
    include('file_upload.php');
}elseif (action == 'get_users'){
    get_users_info();
    header("Location: readdatabase.php");
}elseif ($action == 'users_info') {
    $users = get_users_info();
    include_once 'readdatabase.php';
}elseif ($action == 'upload') {
    $file = $_FILES['tree_image']['tmp_name'];
    $target_file = "../images/" . basename($_FILES["tree_image"]["name"]);
    $tree_image = addslashes(file_get_contents($_FILES['tree_image']['tmp_name']));
    $tree_image_filename = addslashes($_FILES['tree_image']['_name']);
    $tree_image_size = getimagesize($_FILES['tree_image']['tmp_name']);
    /*$file1 = $_FILES['tree_leaf_image']['tmp_name'];
    $target_file1 = "../trees.jasonandmore.com/images/" . basename($_FILES["tree_image"]["name"]);
    $tree_leaf_image = addslashes(file_get_contents($_FILES['tree_leaf_image']['tmp_name']));
    $tree_leaf_image_filename = addslashes($_FILES['tree_leaf_image']['name']);
    $tree_leaf_image_image_size = getimagesize($_FILES['tree_leaf_image']['tmp_name']);*/
    $tree_name = filter_input(INPUT_POST, 'tree_name');
    $tree_genus = filter_input(INPUT_POST, 'tree_genus');
    $tree_description = filter_input(INPUT_POST, 'tree_description');
    $tree_id = filter_input(INPUT_POST, 'tree_id', FILTER_VALIDATE_INT);
    #$user_id = get_user_id();
    #$users_id = filter_input(INPUT_POST, 'users_id', FILTER_VALIDATE_INT);
   

    if (empty($file)) {
        #echo'No file selected';
        include '../errors/error_noFile.php';
    } else if (!isset($file)) {
         $no_tree_image = "You must enter a Tree Image to continue";
         echo"<script type='text/javascript'>alert('$no_tree_image');</script>";
         include('upload.php');
    /*} else if (!isset($file1)) {
         $no_leaf_image = "You must enter a Tree Leaf Image to continue";
         echo"<script type='text/javascript'>alert('$no_leaf_image');</script>";
         include('upload.php');*/
    } elseif (empty($tree_name )) {
        $no_tree_name = "You must enter Tree Name to continue";
        echo"<script type='text/javascript'>alert('$no_tree_name');</script>";
    } else {
        get_add_tree($target_file, $tree_name, $tree_genus, $tree_description);
        #get_add_tree($target_file, $users_id);
        $tree_ids = get_tree_id($tree_id);
        $trees = get_trees_info();
        
        include('upload.php');
    }
}    elseif ($action == 'guest') {
    $trees = get_trees($tree_name, $tree_genus, $tree_description, $tree_image, $tree_leaf_image);
    include_once 'view_trees.php';
}elseif ($action == 'edit_tree') {
    $tree_id = filter_input(INPUT_POST, 'tree_id', FILTER_VALIDATE_INT);
    $tree_name = filter_input(INPUT_POST, 'tree_name');
    $tree_genus = filter_input(INPUT_POST, 'tree_genus');
    $tree_description = filter_input(INPUT_POST, 'tree_description');
    $tree_ids = get_tree_id($tree_id);
    $trees = get_trees();
    include 'edit_tree.php';
  
}elseif ($action == 'show_tree_edits') {
    $tree_name = filter_input(INPUT_POST, 'tree_name');
    $tree_genus = filter_input(INPUT_POST, 'tree_genus');
    $tree_description = filter_input(INPUT_POST, 'tree_description');
    $tree_id = filter_input(INPUT_POST, 'tree_id', FILTER_VALIDATE_INT);
    edit_tree_entry($tree_name, $tree_genus, $tree_description, $tree_id);
       #header("Location: ?action=get_trees");
       include 'view_trees.php';
}else if ($action == 'delete_tree') {
    $tree_name = filter_input(INPUT_POST, 'tree_name');
    $tree_genus = filter_input(INPUT_POST, 'tree_genus');
    $tree_description = filter_input(INPUT_POST, 'tree_description');
    $tree_id = filter_input(INPUT_POST, 'tree_id', FILTER_VALIDATE_INT);
    

    delete_entry($tree_id);
    echo 'tree_id' .$tree_id;
    $trees = get_trees();
    include_once 'view_trees.php';
} 
?>
