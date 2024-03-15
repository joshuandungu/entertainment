<?php
// Connect to the database
require('includes/connection.php');


// Sign Up Function
function signup($conn) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        // Generate a unique random password for each user
        $user_id = mt_rand(100000000, 999999999);
        
        // Hash the password before storing it in the database
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert the user's data into the database using prepared statements
        $sql = "INSERT INTO admin (user_id, name, email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
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

// Call signup function
signup($conn);

// Close the MySQL connection
mysqli_close($conn);
?>
