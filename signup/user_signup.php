<?php include ('../view/header.php');?>

<form action=".?action=signUp" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="signUp">
    <label>First and Last Name:</label>
    <input type="text" name="name" value="<?php htmlspecialchars("Name"); ?>" onfocus="this.value = '';" required="required"><br>
    
    <label>email:</label>
    <input type="text" name="email" value="<?php htmlspecialchars("Email"); ?>" onfocus="this.value = '';" required="required"><br>
    
    <label>Password:</label>
    <input type="text" name="password" value="<?php htmlspecialchars("Password");?>" onfocus="this.value='';" required="required"><br>
    
    <label>&nbsp;</label><br>
    <input type="submit" value="Add User" class="submit"/>
      
      </form>
<?php include ('../view/footer.php');?>