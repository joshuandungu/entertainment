<?php 
 include ('includes/header.php');
include ('includes/connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cat = mysqli_real_escape_string($conn, $_POST['cat']);
        // generate a unique id
        $cat_id = uniqid('cat_', true);
        // Insert the user's data into the database using prepared statements
        $sql=mysqli_query($conn, "INSERT  INTO music_cat (cat_id,cat) VALUES('$cat_id', '$cat')");


        if ($sql == TRUE) {
            // Redirect the user to the login page after successful sign-up
            echo '<script>alert(" Music Category inserted successfully");</script>';
            header('Location: music_cat.php');
            exit();
        } else {
            // Handle sign-up errors gracefully
            echo '<script>alert("Error: Unable to add category");</script>';
        }
    }
?>

<align-items-right>
           <!-- Signup Form -->
           <div class="form-container">
             <form class="form" action="add_music_cat.php" method="POST">
               <h2>ADD  MUSIC CATEGORY</h2>
               <div class="form-group">
                <label id = "cat"> ADD CAT</label>
                <input type="text" name="cat"  id = "cat"  placeholder="Category" required>
               </div>
               <button  class= "btn btn-primary" type="submit">Add Category</button>
               </div>
               </form>
              </td>
              </tr>
            </table>
          </align-items-right>