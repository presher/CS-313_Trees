<?php

require ('../model/database.php');
require ('../model/trees.php');

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'upload';
    }
}    


if(action == "upload"){
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
    $add_trucks = get_add_trucks($category_id, $name, $year);
}elseif (action == 'get_users'){
    get_users_info();
    header("Location: readdatabase.php");
}elseif ($action == 'users_info') {
    $users = get_users_info();
    include_once 'readdatabase.php';
}
?>
