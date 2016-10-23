<?php include ('../view/header.php');?>
<h3>Please edit the Tree info</h3>
    <img src="<?php echo $tree_ids["tree_image"]; ?>" alt="" height="100" width="150"><br>
    <label>Tree ID:</label>&nbsp;
    <?php echo $tree_ids['tree_id']; ?>
    <br>

    <form action="?action=show_tree_edits" method="post" >
        <input type="hidden" name="action" value="show_tree_edits">

      
        <label>Tree Name:</label>
        <input type="text" name="tree_name" value="<?php echo htmlspecialchars($tree_ids['tree_name']); ?>"/>

        <br>

        <label>Tree Genus:</label>
        <input type="text" name="tree_genus" value="<?php echo htmlspecialchars($tree_ids['tree_genus']); ?>"/>
        <br>

        <label>Tree Description</label>
        <input type="text" name="tree_description" value="<?php echo htmlspecialchars($tree_ids['tree_description']); ?>"/>
        <br>

        <label>&nbsp;</label>
        <input type="hidden" name="tree_id" value="<?php echo $tree_ids['tree_id']; ?>"/>
        <br>


        <label>&nbsp;</label>
        <input type="submit" value="Edit"/>
        <br>
    </form>
    <form action=".?action=get_trees" method="post">
        <input type="hidden" name="action" value="cancel">
        <label>&nbsp;</label>
        <input type="submit" value="Cancel"/>
        <br>
    </form>
<?php include ('../view/footer.php');?>