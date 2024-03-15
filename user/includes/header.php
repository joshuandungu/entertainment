<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YouTube</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Include your custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cantarell:italic|Droid+Serif:bold,700" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="music.php">Music</a></li>
                <li><a href="videos.php">Videos</a></li>
                <li><a href="movies.php">Movies</a></li>
                
                <?php 
                // Check if user is logged in
                if (isset($_SESSION['user_id'])) {?>
                
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
               <?php  } else {?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>
              <?php   }
                ?>
            </ul>
        </nav>
    </header>