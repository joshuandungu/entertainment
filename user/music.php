<?php include("includes/header.php");
require('functions.php');
require('includes/connection.php'); ?>
<button class="btn btn-primary"><a href="uploadaudio.php">Upload Music</a></button>
<hr><br>
<div class="container">

    <?php
    get_music_cat($conn);
    ?>
    <hr><br>
    <div>
        <form action="" METHOD="GET">
            <input type="text" name="search">
            <button class="btn" type="submit" value="submit">Search</button>
        </form>
    </div>
    <?php

    displaymusic($conn);
    ?>
</div>
<?php include("includes/footer.php"); ?>