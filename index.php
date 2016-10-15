<?php include_once ('view/header.php');?>
<main>
    <h1>Welcome to TREES</h1>
	<h2>TREES is coming soon!!</h2>
        <form action="/model/" method="post">
        <input type="hidden" name="action" value="users_info">
         <label>&nbsp;</label>
        <input type="submit" value="Users Info">
</main>
    <?php include_once ('view/footer.php');?>