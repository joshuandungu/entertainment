<?php
require('includes/connection.php');
require('functions.php');
delete_movie($conn);
?>

<?php include("includes/header.php"); ?>
<div class="container">

    <?php
    display_movie($conn);
    ?>
</div>
<?php include("includes/footer.php"); ?>