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

