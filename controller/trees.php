<?php include ('../view/header.php');?>

<h3>Please upload a Tree</h3>
    


<form action=".?action=upload" method="post" enctype="multipart/form-data">
    <label>Tree Name:</label>
    <input type="text" name="tree_name" value="<?php htmlspecialchars("Tree Name"); ?>" onfocus="this.value = '';"><br>
    
    <label>Tree Genus:</label>
    <input type="text" name="tree_genus" value="<?php htmlspecialchars("Tree Genus"); ?>" onfocus="this.value = '';"><br>
    
    <label>Tree Image:</label>
    <input type="file" name="tree_image" id="fileToUpload"><p>You can only upload JPG, JPEG, PNG & GIF files</p><br>
    
    <!--<label>Tree Leaf Image:</label>
    <input type="file" name="tree_leaf_image" id="fileToUpload"><p>You can only upload JPG, JPEG, PNG & GIF files</p><br>-->
    
    <label>Tree Description</label>
    <textarea rows="4" cols="20" name="tree_description"></textarea><br>
    
    <label>&nbsp;</label>
    <input type="hidden" name="tree_id" value="<?php echo $tree_ids['tree_id']; ?>"/><br>
    
    <label>&nbsp;</label>
    <input type="hidden" name="users_id" value="<?php echo $users_id['1']; ?>"/><br>
    
    <label>&nbsp;</label><br>
    <input type="submit" value="Add Tree" class="submit"/><br>
</form>

<?php include ('../view/footer.php');?>
