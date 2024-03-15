<?php include ('includes/header.php');
require ('includes/connection.php'); 
?>
<div class="container">
    <!-- Gallery Section -->
    <h1>GALLERY</h1>
    
<?php

// Include your database connection file

// Query to retrieve audio file information
$sql = mysqli_query($conn,"SELECT * FROM gallery  LIMIT  6");
// Check if there are any image  files in the database
if (mysqli_num_rows($sql) > 0) {

            while($row = mysqli_fetch_array($sql)){
            ?>
             <div class="polaroid">
                <img src="images/<?php echo $row['image']; ?>" width="300px" height="150px" alt="Service 1">
                <div class="container1">
                    <h3><?php echo $row['category']; ?></h3>
                </div>
            </div>
                <button class="btn btn-danger"><a href="checkgallery.php">View More</a></button>
            <?php }} else { ?>
                <h3 style="color:red; font-weight:bold">No image Uploaded</h3>
                <button class="btn btn-danger"><a href="uploadgallery.php">Upload Gallery</a></button>

                <?php }?>

    
</div>


<hr>
<!-- Music section -->
<div class ="container">
    <h1> Music</h1>

<?php

// Query to retrieve audio file information
$ret = "SELECT * FROM audio_files LIMIT 6 " ;
$result = mysqli_query($conn, $ret);

// Check if there are any audio files in the database
if (mysqli_num_rows($result) > 0) {
    // Output an HTML audio player for each audio file
    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML audio player
        ?>
        <div class="polaroid"><audio controls width: 50px>
                    <source src="audio/<?php echo $row['audio_name']; ?>" type="audio/mpeg">;

                </audio>
                <div class="container1">
                    <h1><?php echo $row['music_title']; ?></h1>
                    <h3><?php echo $row['category']; ?></h3>
                    <h6><?php echo $row['audio_name']; ?></h6>
                    </div>
            </div>
                <button class="btn btn-danger"><a href="music.php">View More</a></button>
            <?php }} else { ?>
                <h3 style="color:red; font-weight:bold">No Music Uploaded</h3>
                <button class="btn btn-danger"><a href="uploadaudio.php">Upload Music</a></button>

                <?php }?>
</div> 

<hr>

 <!-- Video section -->
<div class ="container">
    <h1> Videos</h1>

<?php

// Query to retrieve video file information
$ret = "SELECT * FROM video_files LIMIT 6 " ;
$result = mysqli_query($conn, $ret);

// Check if there are any video files in the database
if (mysqli_num_rows($result) > 0) {
    // Output an HTML audio player for each audio file
    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML audio player
        ?>
        <div class="polaroid"><video controls width="300px" height="150">
                    <source src="videos/<?php echo $row['video_name']; ?>" type="video/mp4">;

                </video>
                <div class="container1">
                    <h3><?php echo $row['video_title']; ?></h3>
                    </div>
            </div>
                <button class="btn btn-danger"><a href="videos.php">View More</a></button>
            <?php }} else { ?>
                <h3 style="color:red; font-weight:bold">No Video Uploaded</h3>
                <button class="btn btn-danger"><a href="uploadvideos.php">Upload Video</a></button>

                <?php }?>
</div> 


<hr>
<!-- Movie section -->
<div class ="container">
    <h1> Movies</h1>

<?php

// Query to retrieve movie file information
$ret = "SELECT * FROM movies LIMIT 6 " ;
$result = mysqli_query($conn, $ret);

// Check if there are any movie files in the database
if (mysqli_num_rows($result) > 0) {
    // Output an HTML audio player for each audio file
    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML audio player
        ?>
        <div class="polaroid"><video controls width="300px" height="150px">
                    <source src="movies/<?php echo $row['movie_name']; ?>" type="video/mp4">;

                </video>
                <div class="container1">
                    <h6><?php echo $row['movie_name']; ?></h6>
                    </div>
            </div>
                <button class="btn btn-danger"><a href="movies.php">View More</a></button>
            <?php }} else { ?>
                <h3 style="color:red; font-weight:bold">No Movie Uploaded</h3>
                <button class="btn btn-danger"><a href="uploadmovies.php">Upload Movie</a></button>

                <?php }?>
</div> 
<?php include ('includes/footer.php'); ?>