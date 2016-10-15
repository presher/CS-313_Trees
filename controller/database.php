<?php
    $$dsn='mysql:host=mysql.jasonandmore.com;dbname=trees_information_db';
    $username = 'jasonandmorecom';
    $password = 'STx9VCe2';
    
    
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>