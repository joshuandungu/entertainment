<?php
// database coonection
// define('SETURL','http://localhost/index.php/');
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "entertainment";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname))
{
    die("Failed to connect to database:");
}
else {
    // echo 'connected successfully';
}
// Set character encoding to UTF-8
mysqli_set_charset($conn, 'utf8');




?>
