<?php
    /*$dsn='mysql:dbname=trees_information_db;host=mysql.jasonandmore.com';
    $username = 'jasonandmorecom';
    $password = 'STx9VCe2';
    
    
 
     global $dsn, $username, $password;
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
   }
 
?>

<?php
function get_users_info(){
   global $db;
   $query = 'SELECT * FROM users';
   $statement = $db->prepare($query);
   $statement->execute();
   $users = $statement->fetchAll();
   $statement->closeCursor();
   return $users;
}*/
?>

<?php include ('../view/header.php');?>


<h1>Welcome To Trees Users Database</h1>

<?php foreach ($users as $user) : ?>

    <table>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Tree ID</th>
        </tr>
        <tr>
            <td><?php echo $user["users_id"]; ?></td>
            <td><?php echo $user["name"]; ?> </td>
            <td> <?php echo $user["users_name"]; ?></td>
            <td><?php echo $user["email"]; ?></td>
            <td><?php echo $user["password"]; ?></td>
            <td><?php echo $user["tree_id"]; ?></td>
    </table>

<?php endforeach; ?>

<?php include ('../view/footer.php');?>