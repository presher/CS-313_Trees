<?php include ('../view/header.php');?>

<?php foreach ($trees as $tree) : ?>

    <table>
        <tr>
            <th>Tree Image</th>
            <th>Tree Leaf Image</th>
            <th>TreeName</th>
            <th>Tree Genus</th>
            <th>Tree Description</th>
            <th>Delete Tree</th>
            <th>Edit Tree</th>
        </tr>
       
            <td ><img src="<?php echo $tree_ids["tree_image_filename"]; ?>" alt="" height="100" width="150">
            </td>
            
            <td ><img src="<?php echo $tree["tree_leaf_image_filename"]; ?>" alt="" height="100" width="150">
            </td>
            <td><?php echo $tree["tree_name"]; ?> </td>
            <td> <?php echo $tree["tree_genus"]; ?></td>
            <td><p><?php echo $tree["tree_description"]; ?></p></td>
            <td>
                <form action=".?action=delete_tree" method="post" >
                    <input type="hidden" name="action" value="delete_tree">
                    <input type="hidden" name="tree_id" value="<?php echo $tree['tree_id']; ?>">
                    
                    <input type="submit" name="submit" value="DELETE TREE" class="submitt">
                </form>
            </td>
            <?php echo 'tree_id' .$tree_ids;?>
            <td>

                <form action=".?action=edit_tree" method="post" >
                    <input type="hidden" name="action" value="edit_tree">
                    <input type="hidden" name="tree_id"
                           value="<?php echo $tree['tree_id']; ?>">
                    <input type="submit" name="submit" value="EDIT" class="submitt">
                </form>
            </td>

    </table>

<?php endforeach; ?>

<?php include ('../view/footer.php');?>