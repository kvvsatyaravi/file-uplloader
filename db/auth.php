<?php
$servername = "localhost";
$username = "admin";
$password = "";
$db = "test";

// Create connection
$con = new mysqli($servername, $username, $password, $db);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"."<br>";
?>