<?php

require ('../models/database.php');
require ('../models/trees.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'signUp';
    }
} elseif ($action == 'signUp') {
    
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $name = filter_input(INPUT_POST, 'name');
    $password = filter_input(INPUT_POST, 'password');
    if ($email == FALSE || $email == NULL && $name == FALSE || $name == NULL && $password == FALSE || $password == NULL) {
        echo"<script type='text/javascript'>alert('Invalid SignUp Please Try Again.');</script>";
        include '/signup/user_signup.php';
    }  else if ($email == $_POST['email']) {
        verify_email($email);
        if (!isset($email[email])) {
            $emailExists = 'Email address already exists. Please log in';
            echo "<script type='text/javascript'>alert('$emailExists');</script>";
            include '../login/user_login.php';
        }
    } else if ($email !== FALSE && $email != NULL || $name !== FALSE && $name !== NULL || $password !== FALSE && $password !== NULL) {
        insert_user($email, $name, $password);
        include '../login/user_login.php';
    }elseif ($action == 'logIn') {
        $email = filter_input(INPUT_POST, 'logIn', FILTER_VALIDATE_EMAIL);
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        get_user($email, $id);
        if ($email == FALSE && $id == FALSE) {
            echo 'You have eneterd an invalid log in please try again';
        } else {
            include '../upload_controller/file_upload.php';
        }
    } elseif ($action == 'upload') {
        $file = $_FILES['vehicle_image']['tmp_name'];
        $target_file = "../images/" . basename($_FILES["vehicle_image"]["name"]);
        $vehicle_image = addslashes(file_get_contents($_FILES['vehicle_image']['tmp_name']));
        $image_filename = addslashes($_FILES['vehicle_image']['name']);
        $image_size = getimagesize($_FILES['vehicle_image']['tmp_name']);
        $vehicle_name = filter_input(INPUT_POST, 'vehicle_name');
        $vehicle_year = filter_input(INPUT_POST, 'vehicle_year', FILTER_VALIDATE_INT);
        $vehicle_type = filter_input(INPUT_POST, 'vehicle_type');
        $text = filter_input(INPUT_POST, 'text');
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        get_vehicle_type();

        if (empty($file)) { 
            #echo'No file selected';
            include '../errors/error_noFile.php';
        } else if (!isset($file)) {
            echo ' no image selected';
        } elseif (empty($vehicle_name && $vehicle_type && $vehicle_year)) {
            echo '';
            include_once '../errors/error_missing.php';
        } else {
            get_add_autos_images($target_file, $vehicle_year, $vehicle_type, $text, $vehicle_name);
            $ids = get_image_id($id);
            #$types = get_vehicle_type('vehicleType');
            include('upload.php');
        }
    } elseif ($action == 'delete') {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        delete_entry($id);
    }
}