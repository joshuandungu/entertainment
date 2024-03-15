<?php 
delete_movie($conn);
?>



<?php include("includes/header.php");?>
<button class="btn btn-primary"><a href="uploadmovies.php">Upload Movie</a></button>
<div class ="container">

<?php
check_movies($conn);
?>
</div>
<?php include("includes/footer.php");?>




