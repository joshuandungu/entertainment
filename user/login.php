<?php
include('includes/connection.php');
include('includes/header.php');
require_once('loginfunc.php');
login($conn);
?>
<!-- Login Form -->
<div class="form-container">

  <form name="f1" onsubmit="return validation()" action="loginfunc.php" method="POST" class="form">
    <h2>Login</h2>
    <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off" style="background-color: whitesmoke;">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pass" placeholder="Password" name="password" autocomplete="off" style="background-color: whitesmoke;">
    </div>
    <button type="submit" class="btn btn-primary" id="btn" name="submit" style="height: 40px;">Login</button>
    <span>Don't have an account? <a href="signup.php">Create Your Account</a> </span>

  </form>
  </align-items-right>
</div>

<script>
  function validation() {
    var email = document.f1.email.value;
    var ps = document.f1.pass.value;
    if (email.length == '' && ps.length == '') {
      alert('Email and Password fields are empty');
      return false;
    } else {
      if (email.length == '') {
        alert('User Email is empty');
        return false;
      }
      if (ps.length == '') {
        alert('Password field is empty');
        return false;
      }
    }
  }
</script>


<?php include('includes/footer.php'); ?>