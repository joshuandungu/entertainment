<?php include('includes/header.php');
require('functions.php');
require('includes/connection.php'); ?>

<button class="btn btn-primary"><a href="uploadmovies.php">Upload Movie</a></button>
<hr><br>
<div class="container">

    <?php
    // Include your database connection file
    get_cat($conn);
    ?>
    <hr><br>
    <div class= "form-control">
        <form  class = "form-control" action="" METHOD="GET">
            <input type="text" class = "form-control" name="search">
            <button class="btn" type="submit" value="submit">Search</button>
        </form>
    </div>
    
    <?php
    displaymovies($conn);

    ?>
</div>

<?php include('includes/footer.php'); ?>