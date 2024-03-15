<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "entertainment";

if(!$conn = mysqli_connect($server,$user,$password,$dbname))
{
    die("Failed to connect to database:");
}
// else {
//     echo ' <script>alert("Connected successfully");<script>';
// }
// Set character encoding to UTF-8
mysqli_set_charset($conn, 'utf8');
?>
