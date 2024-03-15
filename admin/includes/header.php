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
        <nav style = "background-color: black";>
            <ul>

                <?php
                // Check if user is logged in
                if (!isset($_SESSION['user_id'])) { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
                    
                <?php  } else { ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="category.php">General Category</a></li>
                    <li><a href="music_cat.php">Music Category</a></li>
                    <li><a href="checkgallery.php">Gallery</a></li>
                    <li><a href="checkmusic.php">Music</a></li>
                    <li><a href="checkvideos.php">Videos</a></li>
                    <li><a href="checkmovies.php">Movies</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php   }
                ?>
            </ul>
        </nav>
    </header>