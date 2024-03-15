<?php include("includes/header.php");
require('functions.php');
require('includes/connection.php'); ?>
<button class="btn btn-primary"><a href="uploadvideos.php">Upload Video</a></button>
<hr><br>
<div class="container">

    <?php
    // Include your database connection file
    get_video_cat($conn);
    ?>
    <hr><br>
    <div>
        <form action="" METHOD="GET">
            <input type="text" name="search">
            <button class="btn" type="submit" value="submit">Search</button>
        </form>
    </div>
    <?php

    displayvideos($conn);
    ?>
</div>

<?php include("includes/footer.php"); ?>