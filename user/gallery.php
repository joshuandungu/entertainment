<?php include("includes/header.php");
require('includes/connection.php');
require('functions.php') ?>
<button class="btn btn-primary"><a href="uploadgallery.php">Upload Image</a></button>
<hr>
<br>
<div class="container">

    <?php
    get_image($conn);
    ?>
    <hr><br>
    <div>
        <form action="" METHOD="GET">
            <input type="text" name="search">
            <button class="btn" type="submit" value="submit">Search</button>
        </form>
    </div>
    <?php
    displayimages($conn);
    ?>
</div>
<?php include("includes/footer.php"); ?>