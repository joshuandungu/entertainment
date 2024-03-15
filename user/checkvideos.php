<?php 
require_once('functions.php');
delete_video($conn);
?>


<?php include("includes/header.php");?>
<button class="btn btn-primary"><a href="uploadvideos.php">Upload video</a></button>
<div class ="container">

<?php
check_videos($conn);
?>
</div>
<?php include("includes/footer.php");?>





