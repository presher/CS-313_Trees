<?php
require ('../models/database.php');
require ('../models/trees.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'logIn';
    }
} elseif ($action == 'logIn') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $users_id = filter_input(INPUT_POST, 'users_id', FILTER_VALIDATE_INT);
    $password = filter_input(INPUT_POST, 'password');
    $name = filter_input(INPUT_POST, 'name');
    $user = get_user_name($name, $email);
    $id = get_user_id($email);
    $uname = get_user_name($email);
    
    //get_user_name($email);
    if ($email_address == FALSE && $password == FALSE && $name == FALSE) {
        echo"<script type='text/javascript'>alert('Incorrect Login Info. Please Try Again');</script>";
    } else {
        
         $users_id = filter_input(INPUT_POST, 'users_id', FILTER_VALIDATE_INT);
        include '../login/welcome.php';
    }
}else if ($action == 'upload_tree') {
    echo 'here i am';
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $id = get_user_id($email);
   
    echo 'here I am';
    header('Location: ../controller/trees.php');
}else if ($action == 'signout'){
    echo"<script type='text/javascript'>alert('You have sucessfully signed out.');</script>";
    include '../index.php';
}
