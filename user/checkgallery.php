<?php 
require ('functions.php');
delete_image($conn);
?>


<?php include ("includes/header.php"); ?>
<button class="btn btn-primary"><a href="uploadgallery.php">Upload Image</a></button>
<div class = "container">
    
            <?php 
            checkgallery($conn);
            ?>
        </div>
<?php include ("includes/footer.php"); ?>




