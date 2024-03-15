<?php 
include ("includes/connection.php");
include ('includes/header.php');
include ('signupfunc.php');
signup($conn);
?>

                                
           <align-items-right>
           <!-- Signup Form -->
           <div class="form-container">
             <form class="form" action="signupfunc.php" method="POST">
               <h2>Sign Up</h2>
               <div class="form-group">
                 <input type="text" name="name" placeholder="Name" required>
               </div>
               
               <div class="form-group">
                 <input type="email" name="email" placeholder="Email" required>
               </div>
               <div class="form-group">
                 <input type="password" name="password" placeholder="Password" required>
               </div>
               <button type="submit">Sign Up</button>
               <div class="form-footer">
                 <span>Already have an account?</span>
                 <a href="login.php">Login</a>
               </div>
               </form>
              </td>
              </tr>
            </table>
          </align-items-right>
                        </div>

                        
                             <?php include('includes/footer.php');?>

                             