<?php
$lifetime = 60 * 60 * 24 * 7;    // 1 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

if (isset($_POST["username"])){
    include 'welcome.php';
}

/*if ($_POST && $_POST["username"] && $_POST["password"]) {
    $servername = "mysql.jasonandmore.com";
    $username = "jasonandmorecom";
    $password = "STx9VCe2";
    $dbName = "trees_information_db";
// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbName);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (!mysqli_select_db($conn, $dbName)) {
        die("Uh oh, couldn't select database $dbName");
    }
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "select * from user where email = '$email'";
    $user = mysqli_query($conn, $sql);
    $authenticated = false;
    if ($user != null && $user->num_rows > 0) {
        $_SESSION["authenticated"] = true;
        while ($row = $user->fetch_assoc()) {
            if (password_verify($password, $row["password"])) {
                $authenticated = true;
                $_SESSION["userId"] = $row["user_id"];
                $_SESSION["userEmail"] = $row["email"];
                $_SESSION["authenticated"] = true;
                break;
            }
        }
    }
    if ($authenticated) {
        header('Location: welcome.php');
    } else {
        header('Location: login.php');
    }
}*/
    

?>


<?php include ('../view/header.php');?>

<form id="form-signin" action=".?action=logIn" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="logIn">
    <label>email:</label>
    <input type="text" name="email" value="<?php htmlspecialchars("Email"); ?>" onfocus="this.value = '';" required="required"><br>
    
    <label>Password:</label>
    <input type="text" name="password" value="<?php htmlspecialchars("Password");?>" onfocus="this.value='';" required="required"><br>
    
    <label>&nbsp;</label>
    <input type="hidden" name="users_id" value="<?php echo $users_id['user_id']; ?>"/>
    
    <label>&nbsp;</label><br>
    <input type="submit" value="LogIn" class="submit"/>
      
      </form>
<script type="text/javascript">
    $(document).ready(function() {
        $('#form-signin').validate();
    });
</script>

<?php include_once ('../view/footer.php');?>
