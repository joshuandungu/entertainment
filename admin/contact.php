<?php
require("includes/connection.php");
include('includes/header.php');
require('functions.php');
?>
<?php 
modify_contact($conn);
?>

<div class="container">
    <h1 align-items="center" style="padding-left: 400px;"> USER ACCOUNT </h1>
    <table>
        <tr>
            <th>#</th>
            <th>USERID</th>
            <th>NAME</th>
            <th>EMAIL</th>
			<th>PHONE</th>
			<th>MESSAGE</th>
			<th>STATUS</th>
            <th>ACTION</th>
        </tr>
    
        <?php
		display_contact($conn);
        ?>

    </table>




</div>



<?php include('includes/footer.php'); ?>