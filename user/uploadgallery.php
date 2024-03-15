<?php
// Connect to the database
require('includes/connection.php');
include("includes/header.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $image = $_FILES['upload_image']; // Update to match form field name
    $tmp = $image['tmp_name'];

    // Check if a file is selected
    if (!empty($image['name'])) {
        // Proceed with file upload
        $newimage = mt_rand(1000000, 9999999) . '_' . basename($image['name']);
        $upload_dir = 'images/';
        $target_path = $upload_dir . $newimage;

        if (move_uploaded_file($tmp, $target_path)) {
            $image_id = mt_rand(1000000, 9999999);
            $user_id = $_SESSION['user_id'];
            $query = "INSERT INTO gallery (user_id,image_id, category, image) VALUES ('$user_id','$image_id', '$category', '$newimage')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Image has been uploaded.');</script>";
                echo "<script>window.location.href = 'gallery.php'</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Error uploading the image. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Please select an image to upload.');</script>";
    }
}

mysqli_close($conn);
?>







<div class="form-container">
    <form action="uploadgallery.php" method="POST" enctype="multipart/form-data">
        <label for="category">Category</label>
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

        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="upload_image">

        <button type="submit" class="btn btn-primary" id="btn" name="submit">Upload</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>