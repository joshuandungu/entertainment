<?php
// Connect to the database
require('includes/connection.php');

// Start a session

// Sign Up Function
function signup($conn)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Generate a unique random password for each user
        $user_id = mt_rand(100000000, 999999999);

        // Insert the user's data into the database using prepared statements
        $sql = "INSERT INTO users (user_id, name, email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            // Hash the password before storing it in the database
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "isss", $user_id, $name, $email, $password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // Redirect the user to the login page after successful sign-up
            header('Location: login.php');
            exit();
        } else {
            // Handle sign-up errors gracefully
            echo '<script>alert("Error: Unable to sign up");</script>';
        }
    }
}

// Login Function
function login($conn)
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from users where email='$email' and password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                session_start();
                $_SESSION['user_id'] = $num['user_id'];
                header('location:index.php');
            } else {
                echo '<script>alert("User email and password do not match");</script>';
                header('location:login.php');
            }
        }
    }
    //     $stmt = mysqli_stmt_init($conn);
    //     if (mysqli_stmt_prepare($stmt, $sql)) {
    //         mysqli_stmt_bind_param($stmt, "s", $email);
    //         mysqli_stmt_execute($stmt);
    //         $result = mysqli_stmt_get_result($stmt);
    //         $row = mysqli_fetch_assoc($result);

    //         // Verify the user's password
    //         if ($row && password_verify($password, $row['password'])) {
    //             // Start a new session and store the user's ID
    //             session_start();
    //             $_SESSION['user_id'] = $row['user_id'];

    //             // Redirect the user to the dashboard page after successful login
    //             header('Location: index.php');
    //             exit();
    //         } else {
    //             // Handle invalid credentials
    //             echo '<script>alert("Invalid email or password");</script>';
    //         }
    //     }
    // }
}

// Function to fetch and display movies from the database 

function displaymovies($conn)
{
    // Query to retrieve video information
    if (isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        $query = mysqli_query($conn, "SELECT * FROM movies WHERE category = '$cat'");
    } else if (isset($_GET['search'])) {
        $search_data = $_GET['search'];
        $query = mysqli_query($conn, "SELECT * FROM movies WHERE movie_title LIKE '%$search_data%' || movie_name LIKE '%$search_data%' || category LIKE '%$search_data%'");
    } else {
        $query = mysqli_query($conn, "SELECT * FROM movies ");
    }
?>
    <?php
    // Check if there are any videos in the database
    if (mysqli_num_rows($query) > 0) {
        // Output an HTML video player for each video
        while ($row = mysqli_fetch_assoc($query)) {
            // Output HTML video player
    ?>
            <div class="polaroid">
                <video width="300px" height="150px" controls>;
                    <source src="movies/<?php echo $row['movie_name']; ?>" type="video/mp4">;
                    Your browser does not support the video tag.
                </video>
                <div class="container1">
                    <h4><?php echo $row['movie_title']; ?></h4>
                    <h6><?php echo $row['movie_name']; ?></h6>
                </div>
            </div>
        <?php }
    } else { ?>
        <h3 style="color:red; font-weight:bold"> Search Result not found</h3>
    <?php }
}

// function to fetch and  display category from the database
function get_cat($conn)
{
    $ret = mysqli_query($conn, "SELECT * FROM category");
    while ($row = mysqli_fetch_array($ret)) {
    ?>
        <button class="btn btn-primary"><a href="movies.php?cat=<?php echo $row['cat']; ?>"><?php echo $row['cat']; ?></a></button>
    <?php }
}

// function to fetch and  display music category  from the database

function get_music_cat($conn)
{
    // Include your database connection file
    $ret = mysqli_query($conn, "SELECT * FROM music_cat ");
    while ($row = mysqli_fetch_array($ret)) {
    ?>
        <button class="btn btn-primary"><a href="music.php?cat=<?php echo $row['cat']; ?>"><?php echo $row['cat']; ?></a></button>
    <?php }
}

// functio to  fetch and display music from the database 

function displaymusic($conn)
{
    // Query to retrieve music information
    if (isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        $query = mysqli_query($conn, "SELECT * FROM audio_files WHERE category = '$cat'");
    } else if (isset($_GET['search'])) {
        $search_data = $_GET['search'];
        $query = mysqli_query($conn, "SELECT * FROM audio_files WHERE music_title LIKE '%$search_data%' || audio_name LIKE '%$search_data%' || category LIKE '%$search_data%'");
    } else {
        $query = mysqli_query($conn, "SELECT * FROM audio_files ");
    }
    mysqli_close($conn);
    ?>
    <?php
    // Check if there are any audio files in the database
    if (mysqli_num_rows($query) > 0) {
        // Output an HTML audio player for each audio file
        while ($row = mysqli_fetch_assoc($query)) {
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

        <?php }
    } else { ?>
        <h3 style="color:red; font-weight:bold"> Search Result not found</h3>
    <?php }
}

// function to search video files
function get_video_cat($conn)
{

    $ret = mysqli_query($conn, "SELECT * FROM category");
    while ($row = mysqli_fetch_array($ret)) {
    ?>
        <button class="btn btn-primary"><a href="videos.php?cat=<?php echo $row['cat']; ?>"><?php echo $row['cat']; ?></a></button>
    <?php }
}

// function to fetch and display video files from the database 


function displayvideos($conn)
{
    // Query to retrieve video information
    if (isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        $query = mysqli_query($conn, "SELECT * FROM video_files WHERE category = '$cat'");
    } else if (isset($_GET['search'])) {
        $search_data = $_GET['search'];
        $query = mysqli_query($conn, "SELECT * FROM video_files WHERE video_title LIKE '%$search_data%' || video_name LIKE '%$search_data%' || category LIKE '%$search_data%'");
    } else {
        $query = mysqli_query($conn, "SELECT * FROM video_files ");
    }
    mysqli_close($conn);
    ?>
    <?php
    // Check if there are any videos in the database
    if (mysqli_num_rows($query) > 0) {
        // Output an HTML video player for each video
        while ($row = mysqli_fetch_assoc($query)) {
            // Output HTML video player
    ?>
            <div class="polaroid">
                <video width="300px" height="200px" controls>;
                    <source src="videos/<?php echo $row['video_name']; ?>" type="video/mp4">;
                    Your browser does not support the video tag.
                </video>
                <div class="container1">
                    <h4><?php echo $row['video_title']; ?></h4>
                    <h6><?php echo $row['video_name']; ?></h6>
                </div>
            </div>
        <?php }
    } else { ?>
        <h3 style="color:red; font-weight:bold"> Search Result not found</h3>
    <?php }
}


// function to get image category
function get_image($conn)
{
    // Include your database connection file
    $ret = mysqli_query($conn, "SELECT * FROM category");
    while ($row = mysqli_fetch_array($ret)) {
    ?>
        <button class="btn btn-primary"><a href="gallery.php?cat=<?php echo $row['cat']; ?>"><?php echo $row['cat']; ?></a></button>
    <?php }
}


// function to fetch and display image category from the database 
function displayimages($conn)
{

    // Query to retrieve video information
    if (isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        $query = mysqli_query($conn, "SELECT * FROM gallery WHERE category = '$cat'");
    } else if (isset($_GET['search'])) {
        $search_data = $_GET['search'];
        $query = mysqli_query($conn, "SELECT * FROM gallery WHERE user_id LIKE '%$search_data%' || image_id LIKE '%$search_data%' || category LIKE '%$search_data%'  || image LIKE '%$search_data%'");
    } else {
        $query = mysqli_query($conn, "SELECT * FROM gallery ");
    }
    mysqli_close($conn);
    ?>
    <?php
    if (mysqli_num_rows($query) > 0) {
        // Output an HTML video player for each video
        while ($row = mysqli_fetch_assoc($query)) {
            // Output HTML video player
    ?>
            <div class="polaroid">
                <?php if ($row['image'] == "") : ?>
                    <p class="font-w600">No image uploaded</p>
                <?php else : ?>
                    <img src="images/<?php echo $row['image']; ?>" width="300px" height="150px" alt="Service 1">
                    <div class="container1">
                        <h3><?php echo $row['category']; ?></h3>
                    <?php endif; ?>
                    </div>
            </div>
        <?php }
    } else { ?>
        <h3 style="color:red; font-weight:bold"> Search Result not found</h3>
    <?php }
}

// function to fetch and update profile 
function update_profile($conn)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Generate a unique random password for each user

        // Hash the password before storing it in the database
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $user_id = $_SESSION['user_id'];

        // Insert the user's data into the database using prepared statements
        $sql = mysqli_query($conn, "update users set name='$name', email='$email', password = '$password'  where user_id='$user_id'");


        if ($sql == TRUE) {
            // Redirect the user to the login page after successful sign-up
            echo '<script>alert("Account updated successfully");</script>';
            header('Location: profile.php');
            exit();
        } else {
            // Handle sign-up errors gracefully
            echo '<script>alert("Error: Unable to update account");</script>';
        }
    }
}

// function to delete image from the database 
function delete_image($conn){
if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $delete = mysqli_query($conn,"delete from gallery where image_id ='$delid'");
    if ($delete == TRUE){
        echo '<script>alert("Image deleted successfully");</script>';
    }
    else {
        echo '<script>alert("Error occurred: Image failed to delete");</script>';
    }
}
}

// function to check gallery images 
function checkgallery($conn){

require  ("includes/connection.php");
            $user_id = $_SESSION['user_id'];
            $result = mysqli_query($conn, "SELECT * FROM gallery WHERE user_id = '$user_id'");
            while($row = mysqli_fetch_array($result)){
            ?>
            <div class="polaroid">
                <?php if($row['image'] == ""): ?>
                    <p class="font-w600">No image uploaded</p>
                <?php else: ?>
                    <img src="images/<?php echo $row['image']; ?>" width="300px" height="150px" alt="Image 1">
                    <div class="container1">
                    <h3><?php echo $row['category']; ?></h3>
                    <button class="btn btn-primary" onclick="return confirm('Do you want to delete');">
                    <a href="checkgallery.php?delid=<?php echo $row['image_id'];?>">Delete </a> </button>
                <?php endif; ?>
            </div>
            </div>
            <?php } 
}

// function to delete movies from the database 
function delete_movie($conn){
if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $delete = mysqli_query($conn,"delete from movies where movie_id ='$delid'");
    if ($delete == TRUE){
        echo '<script>alert("Movie deleted successfully");</script>';
    }
    else {
        echo '<script>alert("Error occurred: Movie failed to delete");</script>';

    }

}
}

// function to check movie file from the database 
 function check_movies($conn){
// Get user id from the session
$user_id = $_SESSION['user_id'];

// Query to retrieve audio file information
$sql = "SELECT * FROM movies WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

// Check if there are any audio files in the database
if (mysqli_num_rows($result) > 0) {
    // Output an HTML audio player for each audio file
    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML audio player
        ?>
        <div class="polaroid">
            <video width = "250px"  controls >
        <source src="movies/<?php echo $row['movie_name'];?>" type="video/mp4">;
        
    </video>
            <div class="container1">
            <h3><?php echo $row['movie_title']; ?></h3>
        <h6><?php echo $row['movie_name']; ?></h6>
        <button class="btn btn-primary" onclick="return confirm('Do you want to delete');">
                    <a href="checkmovies.php?delid=<?php echo $row['movie_id'];?>">Delete </a> </button>
        </div>
        </div>
    
    <?php }}} 

    // function to delete music fro the database 
    function delete_music($conn){
    if(isset($_GET['delid'])){
        $delid = $_GET['delid'];
        $delete = mysqli_query($conn,"delete from audio_files where audio_id ='$delid'");
        if ($delete == TRUE){
            echo '<script>alert("Image deleted successfully");</script>';
        }
        else {
            echo '<script>alert("Error occurred: Image failed to delete");</script>';
    
        }
    
    }
}

// function to check music files from the database

function check_music($conn){
// Get user id from the session
$user_id = $_SESSION['user_id'];

// Query to retrieve audio file information
$sql = "SELECT * FROM audio_files  WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

// Check if there are any audio files in the database
if (mysqli_num_rows($result) > 0) {
    // Output an HTML audio player for each audio file
    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML audio player
        ?>
        <div class="polaroid"><audio controls width: 50px>
        <source src="audio/<?php echo $row['audio_name'];?>" type="audio/mpeg">;
        
        </audio>
            <div class="container1">
        <h1><?php echo $row['music_title']; ?></h1>
        <h3><?php echo $row['category']; ?></h3>    
        <h6><?php echo $row['audio_name']; ?></h6>
        <button class="btn btn-primary" onclick="return confirm('Do you want to delete');">
                    <a href="checkmusic.php?delid=<?php echo $row['audio_id'];?>">Delete </a> </button>
        </div>
        </div>
    
    <?php }}
}

// function to delete video from the database 
 function delete_video($conn){
    if(isset($_GET['delid'])){
        $delid = $_GET['delid'];
        $delete = mysqli_query($conn,"delete from video_files where video_id ='$delid'");
        if ($delete == TRUE){
            echo '<script>alert("Video deleted successfully");</script>';
        }
        else {
            echo '<script>alert("Error occurred: Video failed to delete");</script>';
    
        }
    
    }
 }

 // function to check video files from the database 

 function check_videos($conn){
// Get user id from the session
$user_id = $_SESSION['user_id'];

// Query to retrieve audio file information
$sql = "SELECT * FROM video_files WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

// Check if there are any audio files in the database
if (mysqli_num_rows($result) > 0) {
    // Output an HTML audio player for each audio file
    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML audio player
        ?>
        <div class="polaroid"><video controls width = "250px">
        <source src="videos/<?php echo $row['video_name'];?>" type="video/mp4">;
        
    </video>
            <div class="container1">
        <h2><?php echo $row['video_title']; ?></h2>
        <button class="btn btn-primary" onclick="return confirm('Do you want to delete');">
                    <a href="checkvideos.php?delid=<?php echo $row['video_id'];?>">Delete </a> </button>
        </div>
        </div>
    
    <?php }}
 }
    







// Call signup and login functions
signup($conn);
login($conn);

// Close the MySQL connection
?>