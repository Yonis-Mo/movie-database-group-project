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

$table = <<<TABLE
<table>
  <th>Title</th>
  <th>Overview</th>
  <th>Budget</th>
  <th>Revenue</th>
  <th>Release Date</th>
  <th>Runtime</th>
  <th>Average Vote</th>
  <th>Popularity</th>

TABLE;

echo $table;

while ($row = $result->fetch_assoc()) {
  
    echo "<tr>";
    echo "<td>".$row['Title']."</td>";
    echo "<td>".$row['Overview']."</td>";
    echo "<td>".$row['Budget']."</td>";
    echo "<td>".$row['Revenue']."</td>";
    echo "<td>".$row['ReleaseDate']."</td>";
    echo "<td>".$row['Runtime']."</td>";
    echo "<td>".$row['VoteAvg']."</td>";
    echo "<td>".$row['Popularity']."</td>";
    echo "</tr>";

}

echo "</table>";

echo $table;

?>

