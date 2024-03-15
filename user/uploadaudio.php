<?php
// Connect to the database
require('includes/connection.php');
include("includes/header.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file is selected
    if (isset($_FILES['audio_upload']) && $_FILES['audio_upload']['error'] === UPLOAD_ERR_OK) {
        $music_title = $_POST['title'];
        $category = $_POST['category'];
        $audio = $_FILES['audio_upload'];
        $audio_tmp = $audio['tmp_name'];
        $audio_name = mysqli_real_escape_string($conn, basename($audio['name']));
        $audio_type = mysqli_real_escape_string($conn, $audio['type']);

        // Get the user id through session
        $user_id = $_SESSION['user_id'];

        // Read the content of the audio file
        $audio_content = file_get_contents($audio_tmp);
        $audio_content = mysqli_real_escape_string($conn, $audio_content);
        // Generate a unique identifier for the audio file
        $audio_id = uniqid('audio_', true);

        // Insert audio data into the database
        $sql = "INSERT INTO audio_files (user_id, audio_id, music_title, category, audio_name, audio_type) VALUES ('$user_id','$audio_id', '$music_title', '$category', '$audio_name', '$audio_type')";

        if (mysqli_query($conn, $sql)) {
            // Move the uploaded file to the desired directory
            $upload_dir = 'audio/';
            $target_path = $upload_dir . $audio_name;
            move_uploaded_file($audio_tmp, $target_path);
            echo "<script>alert('Audio file uploaded successfully.');</script>";
            header('location:music.php');
        } else {
            echo "<script>alert('Error uploading audio file.');</script>";
        }
    } else {
        echo "<script>alert('Please select an audio file to upload.');</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>


<body>
    <div class="container">
        <h2>Upload Audio File</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Music Title:</label>
            <input type="text" class="form-control" name="title" placeholder="Music Title">

            <label for="category">Music Category:</label>
            <select name="category" class="form-control">
                <?php

                // Include your database connection file 
                require('includes/connection.php');
                $ret = mysqli_query($conn, "SELECT * FROM music_cat");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <option value="<?php echo $row['cat']; ?>"><?php echo $row['cat']; ?></option>
                <?php } ?>
            </select>
            <label for="audio_upload">Select Audio File:</label>
            <input type="file" name="audio_upload" id="audio_upload" class="form-control" accept="audio/*"><br><br>
            <input type="submit" value="Upload" class="btn btn-primary">
        </form>
    </div>
</body>
<?php include("includes/footer.php"); ?>