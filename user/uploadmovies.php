<?php
// Connect to the database
require('includes/connection.php');
include("includes/header.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file is selected
    if (isset($_FILES['movie_upload']) && $_FILES['movie_upload']['error'] === UPLOAD_ERR_OK) {
        $movie_title = $_POST['title'];
        $category = $_POST['title'];
        $movie = $_FILES['movie_upload'];
        $movie_tmp = $movie['tmp_name'];
        $movie_name = mysqli_real_escape_string($conn, basename($movie['name']));
        $movie_type = mysqli_real_escape_string($conn, $movie['type']);
        $movie_size = $movie['size'];

        // Define upload directory
        $upload_dir = 'movies/';
        $target_path = $upload_dir . $movie_name;

        // generate a unique id 
        $movie_id = uniqid('movie_', true);
        // Use session to get user id
        $user_id = $_SESSION['user_id'];

        // Move uploaded file to destination directory
        if (move_uploaded_file($movie_tmp, $target_path)) {
            // Insert movie metadata into the database
            $sql = "INSERT INTO movies (user_id, movie_id, movie_title,category,movie_name, movie_type, movie_size, movie_path) 
                    VALUES ('$user_id', '$movie_id','$movie_title', '$category','$movie_name', '$movie_type', '$movie_size', '$target_path')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Movie uploaded successfully.');</script>";
                header('location:movies.php');
            } else {
                echo "<script>alert('Error uploading movie.');</script>";
            }
        } else {
            echo "<script>alert('Error moving uploaded file.');</script>";
        }
    } else {
        echo "<script>alert('Please select a movie to upload.');</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<body>
    <h2>Upload Movie</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Movie Title:</label>
        <input type="text" class="form-control" name="title" placeholder="Movie Title">

        <label for="category">Movie Category:</label>
        <select name="category" class="form-control">
            <?php

            // Include your database connection file 
            require('includes/connection.php');
            $ret = mysqli_query($conn, "SELECT * FROM category");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <option value="<?php echo $row['cat']; ?>"><?php echo $row['cat']; ?></option>
            <?php } ?>
        </select>
        <label for="movie_upload">Select Movie:</label>
        <input type="file" name="movie_upload" id="movie_upload" accept="video/*"><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
<?php include("includes/footer.php"); ?>