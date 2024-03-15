<?php
require ('includes/connection.php');
require ('functions.php');
delete_gallery($conn);
?>

<?php include("includes/header.php"); ?>
<div class="container">

    <?php
    display_gallery($conn);
    ?>
</div>
<?php include("includes/footer.php"); ?>

