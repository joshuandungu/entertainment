<?php
require ('includes/connection.php');
require_once('functions.php');
delete_video($conn);
?>

<?php include("includes/header.php"); ?>
<div class="container">

    <?php
    display_video($conn);
     ?>
</div>
<?php include("includes/footer.php"); ?>

