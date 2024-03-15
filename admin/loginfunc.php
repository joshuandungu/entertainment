<?php
// Connect to the database
require('includes/connection.php');


// Login Function
function login($conn) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Prepare SQL statement using prepared statement
        $sql = "SELECT * FROM admin WHERE email=? AND password=?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            // Check if user exists
            if ($row = mysqli_fetch_assoc($result)) {
                // Start session and store user ID
                session_start();
                $_SESSION['user_id'] = $row['user_id']; // Assuming 'user_id' is the primary key column in your 'users' table
                
                // Redirect to index.php after successful login
                header('Location: index.php');
                exit();
            } else {
                // Handle invalid credentials
                echo '<script>alert("User email and password do not match");</script>';
                header('Location: login.php');
                exit();
            }
        } else {
            // Handle SQL statement preparation error
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Call signup function
login($conn);

// Close the MySQL connection
mysqli_close($conn);
?>
