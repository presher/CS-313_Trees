<?php include_once ('view/header.php');?>

    <h1>Welcome to TREES</h1>
	<h2>TREES is coming soon!!</h2>
        <form action="/controller/index.php" method="post">
        <input type="hidden" name="action" value="users_info">
         <label>&nbsp;</label>
         <input type="submit" value="Users Info" id="button">

    <?php include_once ('view/footer.php');?>