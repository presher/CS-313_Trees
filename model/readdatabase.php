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
            <td><?php echo $user["tree_id"]; ?></td>
    </table>

<?php endforeach; ?>

<?php include ('../view/footer.php');?>