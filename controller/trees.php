<?php include ('../view/header.php');?>

<h3>Please upload a Tree</h3>
    


<form action=".?action=upload" method="post" enctype="multipart/form-data">
    <label>Tree Name:</label>
    <input type="text" name="tree_name" value="<?php htmlspecialchars("Tree Name"); ?>" onfocus="this.value = '';" required="required"><br>
    
    <label>Tree Genus:</label>
    <input type="text" name="tree_genus" value="<?php htmlspecialchars("Tree Genus"); ?>" onfocus="this.value = '';" ><br>
    
   
    
    <!--<label>Tree Leaf Image:</label>
    <input type="file" name="tree_leaf_image" id="fileToUpload"><p>You can only upload JPG, JPEG, PNG & GIF files</p><br>-->
    
    <label>Tree Comments:</label>
    <textarea rows="4" cols="20" name="tree_description" required="required"></textarea><br>
    
     <label>Tree Image:</label>
    <input type="file" name="tree_image" id="fileToUpload" required="required"><p>You can only upload JPG, JPEG, PNG & GIF files</p><br>
    
    <label>&nbsp;</label>
    <input type="hidden" name="users_id" value="<?php echo $users_id['users_id']; ?>"/><br>
    
    <label>&nbsp;</label><br>
    <input type="submit" value="Add Tree" class="submit"/>
</form>

<?php include ('../view/footer.php');?>
