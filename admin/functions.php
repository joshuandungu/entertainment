<?php
// create database connection
require('includes/connection.php');

// function to delet category from the database 
function delete_cat($conn)
{
    if (isset($_GET['delid'])) {
        $delid = $_GET['delid'];
        $delete = mysqli_query($conn, "DELETE FROM category WHERE cat_id = '$delid'");
        if ($delete == TRUE) {
            echo '<script>alert("Category deleted successfully");</script>';
        } else {
            echo '<script>alert("Error occurred: Unable to delete ");</script>';
        }
    }
}

// function to diaplay category from the database 
function display_cat($conn)
{
    $sql =  mysqli_query($conn, "SELECT * FROM category");
    $cnt = 1;
    while ($row = mysqli_fetch_array($sql)) {
?>
        <tr>
            <th scope="row"><?php echo $cnt; ?></th>
            <td><?php echo $row['cat_id']; ?></td>
            <td><?php echo $row['cat']; ?></td>
            <td>
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete')"><a href=" category.php?delid=<?php echo $row['cat_id']; ?>">DELETE</a></button>
            </td>
        </tr>
    <?php $cnt = $cnt + 1;
    }
}

// function to delete music category
function deletemusic_cat($conn)
{
    if (isset($_GET['delid'])) {
        $delid = $_GET['delid'];
        $delete = mysqli_query($conn, "DELETE FROM music_cat WHERE cat_id = '$delid'");
        if ($delete == TRUE) {
            echo '<script>alert("Category deleted successfully");</script>';
        } else {
            echo '<script>alert("Error occurred: Unable to delete ");</script>';
        }
    }
}

// function to display music category
function displaymusic_cat($conn)
{
    $sql =  mysqli_query($conn, "SELECT * FROM music_cat");
    $cnt = 1;
    while ($row = mysqli_fetch_array($sql)) {
    ?>
        <tr>
            <th scope="row"><?php echo $cnt; ?></th>
            <td><?php echo $row['cat_id']; ?></td>
            <td><?php echo $row['cat']; ?></td>
            <td>
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete')"><a href=" music_cat.php?delid=<?php echo $row['cat_id']; ?>">DELETE</a></button>
            </td>
        </tr>
        <?php $cnt = $cnt + 1;
    }
}

// function to display gallery

function display_gallery($conn)
{
    $result = mysqli_query($conn, "SELECT * FROM gallery");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="polaroid">
                <img src="../user/images/<?php echo $row['image']; ?>" width="300px" height="150px" alt="Image 1">
                <div class="container1">
                    <h3><?php echo $row['category']; ?></h3>
                    <button class="btn btn-primary" onclick="return confirm('Do you want to delete');">
                        <a href="checkgallery.php?delid=<?php echo $row['image_id']; ?>">Delete </a> </button>
                <?php }
        } else { ?>
                <h3 style="font-weight:bold; color:red">No Image Uploaded</h3>

                </div>
            </div>
            <?php }
    }

    //  function to delete gallery
    function delete_gallery($conn)
    {
        if (isset($_GET['delid'])) {
            $delid = $_GET['delid'];
            $delete = mysqli_query($conn, "delete from gallery where image_id ='$delid'");
            if ($delete == TRUE) {
                echo '<script>alert("Image deleted successfully");</script>';
            } else {
                echo '<script>alert("Error occurred: Image failed to delete");</script>';
            }
        }
    }

    // function to delete movies from the database 
    function delete_movie($conn)
    {
        if (isset($_GET['delid'])) {
            $delid = $_GET['delid'];
            $delete = mysqli_query($conn, "delete from movies where movie_id ='$delid'");
            if ($delete == TRUE) {
                echo '<script>alert("Movie deleted successfully");</script>';
            } else {
                echo '<script>alert("Error occurred: Movie failed to delete");</script>';
            }
        }
    }

    // function to display movies from the database 
    function display_movie($conn)
    {

        // Query to retrieve audio file information
        $sql = "SELECT * FROM movies";
        $result = mysqli_query($conn, $sql);

        // Check if there are any audio files in the database
        if (mysqli_num_rows($result) > 0) {
            // Output an HTML audio player for each audio file
            while ($row = mysqli_fetch_assoc($result)) {
                // Output HTML audio player
            ?>
                <div class="polaroid">
                    <video width="250px" controls>
                        <source src="../user/movies/<?php echo $row['movie_name']; ?>" type="video/mp4">;

                    </video>
                    <div class="container1">
                        <h3><?php echo $row['movie_title']; ?></h3>
                        <h6><?php echo $row['movie_name']; ?></h6>
                        <button class="btn btn-primary" onclick="return confirm('Do you want to delete');">
                            <a href="checkmovies.php?delid=<?php echo $row['movie_id']; ?>">Delete </a> </button>
                    </div>
                </div>
            <?php }
        } else {
            ?>
            <h3 style="font-weight:bold; color:red">No Movies Uploaded</h3>


            <?php }
    }

    // function to delete music from the database 
    function delete_music($conn)
    {
        if (isset($_GET['delid'])) {
            $delid = $_GET['delid'];
            $delete = mysqli_query($conn, "delete from audio_files where audio_id ='$delid'");
            if ($delete == TRUE) {
                echo '<script>alert("Image deleted successfully");</script>';
            } else {
                echo '<script>alert("Error occurred: Image failed to delete");</script>';
            }
        }
    }

    // function to display music
    function display_music($conn)
    {


        // Query to retrieve audio file information
        $sql = "SELECT * FROM audio_files";
        $result = mysqli_query($conn, $sql);

        // Check if there are any audio files in the database
        if (mysqli_num_rows($result) > 0) {
            // Output an HTML audio player for each audio file
            while ($row = mysqli_fetch_assoc($result)) {
                // Output HTML audio player
            ?>
                <div class="polaroid"><audio controls width: 50px>
                        <source src="../user/audio/<?php echo $row['audio_name']; ?>" type="audio/mpeg">;

                    </audio>
                    <div class="container1">
                        <h1><?php echo $row['music_title']; ?></h1>
                        <h3><?php echo $row['category']; ?></h3>
                        <h6><?php echo $row['audio_name']; ?></h6>
                        <button class="btn btn-primary" onclick="return confirm('Do you want to delete');">
                            <a href="checkmusic.php?delid=<?php echo $row['audio_id']; ?>">Delete </a> </button>
                    </div>
                </div>
            <?php }
        } else {
            ?>
            <h3 style="font-weight:bold; color:red">No Music Uploaded</h3>


            <?php }
    }

    // function to delet video from the database 
    function delete_video($conn)
    {
        if (isset($_GET['delid'])) {
            $delid = $_GET['delid'];
            $delete = mysqli_query($conn, "delete from video_files where video_id ='$delid'");
            if ($delete == TRUE) {
                echo '<script>alert("Video deleted successfully");</script>';
            } else {
                echo '<script>alert("Error occurred: Video failed to delete");</script>';
            }
        }
    }

    // function to display videos from the file
    function display_video($conn)
    {
        // Query to retrieve audio file information
        $sql = "SELECT * FROM video_files";
        $result = mysqli_query($conn, $sql);

        // Check if there are any audio files in the database
        if (mysqli_num_rows($result) > 0) {
            // Output an HTML audio player for each audio file
            while ($row = mysqli_fetch_assoc($result)) {
                // Output HTML audio player
            ?>
                <div class="polaroid"><video controls width="250px">
                        <source src="../user/videos/<?php echo $row['video_name']; ?>" type="video/mp4">;

                    </video>
                    <div class="container1">
                        <h2><?php echo $row['video_title']; ?></h2>
                        <button class="btn btn-primary" onclick="return confirm('Do you want to delete');">
                            <a href="checkvideos.php?delid=<?php echo $row['video_id']; ?>">Delete </a> </button>
                    </div>
                </div>
            <?php }
        } else {
            ?>
            <h3 style="font-weight:bold; color:red">No Video Uploaded</h3>


            <?php }
    }

    // function to modify contact query messages
    function modify_contact($conn)
    {
        if (isset($_GET['delid'])) {
            $delid = $_GET['delid'];
            $delete = mysqli_query($conn, "DELETE FROM users WHERE user_id = '$delid'");
            if ($delete == TRUE) {
                echo '<script>alert("User account deleted successfully");</script>';
            } else {
                echo '<script>alert("Error occurred: Unable to delete  contact query");</script>';
            }
        } else if (isset($_GET['read_id'])) {
            $read_id = $_GET['read_id'];
            $status = 1;
            $mark_read = mysqli_query($conn, "UPDATE contact SET status = '$status' WHERE user_id = '$read_id'");
            if ($mark_read == TRUE) {
                echo '<script>alert("Contact message  marked read suucessfully");</script>';
            } else {
                echo '<script>alert("Error occurred: Unable to mark read  contact message");</script>';
            }
        } else if (isset($_GET['unread_id'])) {
            $read_id = $_GET['unread_id'];
            $status = 0;
            $mark_read = mysqli_query($conn, "UPDATE contact SET status = '$status' WHERE user_id = '$read_id'");
            if ($mark_read == TRUE) {
                echo '<script>alert("Contact message  marked unread suucessfully");</script>';
            } else {
                echo '<script>alert("Error occurred: Unable to mark unread  contact message");</script>';
            }
        }
    }

    // function to display contact queries
    function display_contact($conn)
    {
        $sql =  mysqli_query($conn, "SELECT * FROM contact");
        $cnt = 1;
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_array($sql)) {
                $status = $row['status'];
            ?>
                <tr>
                    <th scope="row"><?php echo $cnt; ?></th>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td>

                        <?php if ($status == '' || $status == 0) { ?>
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to mark read contact message')"><a href=" contact.php?read_id=<?php echo $row['user_id']; ?>">READ</a></button>
                        <?php } else { ?>
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you dont want mark unread this contact message')"><a href=" contact.php?unread_id=<?php echo $row['user_id']; ?>">UNREAD</a></button>
                        <?php } ?>
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete contact query')"><a href=" users.php?delid=<?php echo $row['user_id']; ?>">DELETE</a></button>
                    </td>
                </tr>
            <?php $cnt = $cnt + 1;
            }
        } else { ?>
            <h3 style="color:red; font-weigt:bold">No contact query found</h3>
        <?php }
    }

    // function to delete user account from the database 
    function delete_user($conn)
    {
        if (isset($_GET['delid'])) {
            $delid = $_GET['delid'];
            $delete = mysqli_query($conn, "DELETE FROM users WHERE user_id = '$delid'");
            if ($delete == TRUE) {
                echo '<script>alert("User account deleted successfully");</script>';
            } else {
                echo '<script>alert("Error occurred: Unable to delete  user account");</script>';
            }
        }
    }

    // function to display user account information
    function display_user($conn)
    {

        $sql =  mysqli_query($conn, "SELECT * FROM users");
        $cnt = 1;
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <th scope="row"><?php echo $cnt; ?></th>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete user account')"><a href=" users.php?delid=<?php echo $row['user_id']; ?>">DELETE</a></button>
                </td>
            </tr>
    <?php $cnt = $cnt + 1;
        }
    }

    ?>