
<?php
require ('includes/connection.php');
include_once('includes/header.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$message = mysqli_real_escape_string($conn,$_POST['message']);

$query = mysqli_query($conn,"INSERT INTO contact (user_id, name,email,phone,message) VALUES('$user_id','$name','$email','$phone','$message')");
if ($query == TRUE){
	echo '<script>alert("Thank you for contacting us, we will come back to you shortly");</script>';
	header('location:contact.php');
}
else  {
	echo '<script>alert("Failed to send your query");</script>';
}
}

// close the Database connection
mysqli_close($conn);

?>

<?php 
require('includes/connection.php');
$user_id = $_SESSION['user_id'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");
while ($row = mysqli_fetch_array($sql)) {
	?>
	<main>
		<section>
			<h2>Send a message</h2>
			<form action="contact.php"  method="POST" enctype="multipart/form-data">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" value = "<?php echo $row['name'];?>" required>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" value = "<?php echo $row['email'];?>" required>
				<label for="phone">Phone:</label>
				<input type="tel" id="phone" name="phone">
				<label for="message">Message:</label>
				<textarea id="message" name="message" required></textarea>
				<button type="submit">Send</button>
			</form>
			<?php }?>
		</section>
		<section>
			<h2>Contact Information</h2>
			<ul>
				<li>Phone: 555-555-5555</li>
				<li>Email: info@photographername.com</li>
				<li>Address: 123 Main Street, NANDI COUNTY</li>
			</ul>
			<ul class="social">
				<li><a href="#">Facebook</a></li>
				<li><a href="#">Instagram</a></li>
				<li><a href="#">Twitter</a></li>
			</ul>
		</section>
		<section>
			<h2>Location</h2>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.767662165459!2d-73.98584168455116!3d40.74831497932865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259b3ec7f74bf%3A0xb1f9c5fa5b5a5a6f!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1646826118547!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</section>
	</main>
    
<?php include('includes/footer.php');?>










