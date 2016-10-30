<?php include ('../view/header.php');?>

<?php foreach ($trees as $tree) : ?>

    <table>
        <tr>
            <th>Tree Image</th>
            <!--<th>Tree Leaf Image</th>-->
            <th>TreeName</th>
            <th>Tree Genus</th>
            <th>Tree Description</th>
           
        </tr>
       
            <td ><img src="<?php echo $tree["tree_image"]; ?>" alt="" height="100" width="150">
            </td>
            
            <!--<td ><img src="<?php echo $tree["tree_leaf_image_filename"]; ?>" alt="" height="100" width="150">
            </td>-->
            <td><?php echo $tree["tree_name"]; ?> </td>
            <td> <?php echo $tree["tree_genus"]; ?></td>
            <td><p><?php echo $tree["tree_description"]; ?></p></td>
            

    </table>

<?php endforeach; ?>

<?php include ('../view/footer.php');?>

