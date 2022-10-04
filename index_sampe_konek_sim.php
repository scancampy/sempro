<?php
$servername = "192.168.20.118";
$username = "xfar2admik";
$password = "6CBjEm7rers1bPsp";
$database = "baak";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>