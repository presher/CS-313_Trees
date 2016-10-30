<?php
function get_users_info(){
   global $db;
   $query = 'SELECT * FROM users';
   $statement = $db->prepare($query);
   $statement->execute();
   $users = $statement->fetchAll();
   $statement->closeCursor();
   return $users;
}
function get_user_id($email){
   global $db;
    $query = 'SELECT users_id FROM users '
            . 'WHERE '
            . '(email = :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
   
   return $user;
}
function get_user_name($email){
   global $db;
    $query = 'SELECT name FROM users '
            . 'WHERE '
            . '(email = :email)';
            
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    //$statement->bindValue(':name', $name);
     $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    
    return $user;
}
function get_add_tree($target_file, $tree_name, $tree_genus, $tree_description, $id){
    global $db;
    $query = 'INSERT INTO trees'
            . '(tree_image, tree_name, tree_genus, tree_description, users_id)'
            . 'VALUES'
            . '(:target_file, :tree_name, :tree_genus, :tree_description, :id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':target_file', $target_file);
   
    $statement->bindValue(':tree_name', $tree_name);
    $statement->bindValue(':tree_genus', $tree_genus);
    $statement->bindValue(':tree_description', $tree_description);
     $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

/*function get_add_tree($target_file, $users_id){
    global $db;
    $query = 'INSERT INTO trees'
            . '(tree_image, users_id)'
            . 'VALUES'
            . '(:target_file, :users_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':target_file', $target_file);
    $statement->bindValue(':user_id', $users_id);
    $statement->execute();
    $statement->closeCursor();
}*/
function get_trees_info(){
   global $db;
   $query = 'SELECT * FROM trees';
   $statement = $db->prepare($query);
   $statement->execute();
   $trees = $statement->fetchAll();
   $statement->closeCursor();
   return $trees;
}
function get_tree_id($tree_id) {
   
    global $db;
    $query = 'SELECT * FROM trees'
             . ' WHERE tree_id = :tree_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tree_id', $tree_id);
    $statement->execute();
    $tree_ids = $statement->fetch();
    $statement->closeCursor();
    #$image_type = $image_id['vehicleType'];
   
    return $tree_ids;
}
function get_trees() {
    global $db;
   $query = 'SELECT * FROM trees ';
    $statement = $db->prepare($query);
    $statement->execute();
    $trees = $statement->fetchAll();
    $statement->closeCursor();
     
    return $trees;
   
}
function delete_entry($tree_id) {
    global $db;
    if ($tree_id != FALSE) {
        $query = 'DELETE FROM trees WHERE tree_id = :tree_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':tree_id', $tree_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
function insert_tree_image($target_files){
    global $db;
    $query = 'INSERT INTO trees '
            . '(tree_image) '
            . 'VALUES '
            . '(:target_files) ';
    $statement = $db->prepare($query);
    $statement->bindValue(':target_files', $target_files);
    $statement->execute();
    $statement->closeCursor();
    }
/*function insert_tree_leaf_image($target_files){
    global $db;
    $query = 'INSERT INTO trees '
            . '(tree_leaf_image) '
            . 'VALUES '
            . '(:target_files) ';
    $statement = $db->prepare($query);
    $statement->bindValue(':target_files', $target_files);
    $statement->execute();
    $statement->closeCursor();
    }*/
 function edit_tree_entry($tree_name, $tree_genus, $tree_description,  $tree_id){
    global $db;
    $query = 'UPDATE trees '
       .'SET tree_name = :tree_name, ' 
       .'tree_genus = :tree_genus, ' 
       .'tree_description = :tree_description '
       .'WHERE tree_id = :tree_id ';
    try {
    $statement = $db->prepare($query);
    $statement->bindValue(':tree_name', $tree_name);
    $statement->bindValue(':tree_genus', $tree_genus);    
    $statement->bindValue(':tree_description', $tree_description);
    $statement->bindValue(':tree_id', $tree_id);
    $statement->execute();
    $statement->fetchAll();
    $statement->closeCursor();
   
    }
      catch (Exception $e) {
          $error_mesage = $e->getMessage();
       echo"<script type='text/javascript'>alert('$error_mesage');</script>";
      }
}
function insert_user($email, $name, $password){
    global $db;
    $query = 'INSERT INTO users'
            . '(email, name, password)'
            . 'VALUES'
            . '(:email, :name, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
    
}
function get_user($email, $password, $name){
    global $db;
    $query = 'SELECT * FROM users';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':name', $name);
    $id = $statement->fetchAll();
    $statement->closeCursor();
    return $id;
}
function verify_email($email){
    global $db;
    $query = " SELECT email FROM users";
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $email_exists = $statement->execute();
            $statement->closeCursor();
            return $email_exists;
}