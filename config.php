<?php
$servername = "localhost";
// MySQL username below(default=root)
$username = "root";
// MySQL password below
$password = "";
$dbname = "opportunity management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header("location:connection_error.php?error=$conn->connect_error");
    die($conn->connect_error);
}
?>
