<?php 
require_once('functions.php');
delete_music($conn);
?>


<?php include("includes/header.php");?>
<button class="btn btn-primary"><a href="uploadaudio.php">Upload Music</a></button>
<div class ="container">

<?
check_music($conn);
?>

</div>
<?php include("includes/footer.php");?>




