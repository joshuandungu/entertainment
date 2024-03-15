<?php
require('includes/connection.php');
require_once('functions.php');
delete_music($conn);
?>

<?php include("includes/header.php"); ?>
<div class="container">

    <?php
    display_music($conn);

    ?>
</div>
<?php include("includes/footer.php"); ?>