<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moviesdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movies WHERE Genres LIKE ?;";
$stmt = $conn->prepare($sql); 
$search_genre = "%Animation%";
$stmt->bind_param("s", $search_genre);
$id = 1;

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo $row['Title'];
}

?>

