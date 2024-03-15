<?php
require("includes/connection.php");
include('includes/header.php');
require('functions.php');

?>
<?php
delete_cat($conn);
?>

<div class="container">
    <h1 align-items="center" style="padding-left: 400px;"> Category </h1>
    <button class="btn btn-primary"><a href="add_category.php">Add Category</a></button>
    <table>
        <tr>
            <th>#</th>
            <th>CAT ID</th>
            <th>CATEGORY</th>
            <th>ACTION</th>
        </tr>

        <?php
        display_cat($conn);
        ?>

    </table>




</div>



<?php include('includes/footer.php'); ?>