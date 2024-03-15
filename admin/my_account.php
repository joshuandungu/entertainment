<?php
include('includes/header.php');
include('includes/connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Generate a unique random password for each user

    // Hash the password before storing it in the database
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $user_id = $_SESSION['user_id'];

    // Insert the user's data into the database using prepared statements
    $sql = mysqli_query($conn, "update admin set name='$name', email='$email', password = '$password'  where user_id='$user_id'");


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
?>



<div class="container">

    <h1 align-items="center" style="padding-left: 400px;"> UPDATE ACCOUNT </h1>
    <?php
    $user_id = $_SESSION['user_id'];
    $sql =  mysqli_query($conn, "SELECT * FROM admin WHERE user_id = '$user_id'");
    while ($row = mysqli_fetch_array($sql)) {
    ?>
        <align-items-right>
            <!-- Signup Form -->
            <div class="form-container">
                <form class="form" action="my_account.php" method="POST">
                    <h2>Update Account</h2>
                    <div class="form-group">
                        <input type="text" name="name" value=" <?php echo $row['name']; ?>" placeholder="Name" required>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" value=" <?php echo $row['email']; ?>" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value=" <?php echo $row['password']; ?>" placeholder="Password" required>
                    </div>
                    <button type="submit">Update Account</button>
            </div>
            </form>
            </td>
            </tr>
            </table>
        </align-items-right>
    <?php  } ?>


</div>
</a>


<?php include('includes/footer.php'); ?>