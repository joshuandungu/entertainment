<?php
// Connect to the database
require('includes/connection.php');
include("includes/header.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $video_title = $_POST['title'];
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $video = $_FILES['video_upload']; // Update to match form field name
    $tmp = $video['tmp_name'];

    // Check if a file is selected
    if (!empty($video['name'])) {
        // Proceed with file upload
        $newvideo = mt_rand(1000000, 9999999) . '_' . basename($video['name']);
        $upload_dir = 'videos/';
        $target_path = $upload_dir . $newvideo;

        // Check if the uploaded file is a valid video file
        $videoFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));
        if ($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov" && $videoFileType != "wmv") {
            echo "<script>alert('Sorry, only MP4, AVI, MOV, and WMV files are allowed.');</script>";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($tmp, $target_path)) {
                $video_id = uniqid('video_', true);
                $user_id = $_SESSION['user_id'];

                // Insert video metadata into the database
                $sql = "INSERT INTO video_files (user_id, video_id, video_title, category, video_name) 
                        VALUES ('$user_id', '$video_id', '$video_title', '$category', '$newvideo')";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Video clip uploaded successfully.');</script>";
                    header('location:videos.php'); // Redirect to the videos page
                    exit;
                } else {
                    echo "<script>alert('Error uploading video clip.');</script>";
                }
            } else {
                echo "<script>alert('Error moving uploaded file.');</script>";
            }
        }
    } else {
        echo "<script>alert('Please select a video clip to upload.');</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<body>
    <h2>Upload Video Clip</h2>
    <form action="" method="post" enctype="multipart/form-data">

        <label for="title">Video Title:</label>
        <input type="text" class="form-control" name="title" placeholder="Video Title">

        <label for="category">Video Category:</label>
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
        <label for="video_upload">Select Video Clip:</label>
        <input type="file" name="video_upload" id="video_upload" accept="video/*"><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
<?php include("includes/footer.php"); ?>