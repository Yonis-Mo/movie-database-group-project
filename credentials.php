<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moviedatabase";
//set data to access database 
$dbhost  = 'localhost';
$dbuser  = 'root';
$dbpass  = '';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>