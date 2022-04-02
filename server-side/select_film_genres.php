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
$search_genre = $_GET['genre'];
$search_genre = "%".$search_genre."%";
//$search_genre = "%Animation%";
$stmt->bind_param("s", $search_genre);

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


if($result->num_rows > 0){
  echo $table;
while ($row = $result->fetch_assoc()) {
  
    echo "<tr>";
    echo "<td>".$row['Title']."</td>";
    echo "<td>".$row['Overview']."</td>";
    echo "<td>".$row['Budget']."</td>";
    echo "<td>".$row['Revenue']."</td>";

    $UNIX_DATE = ($row['ReleaseDate'] - 25569) * 86400;
    $readable_date = gmdate("d-m-Y H:i:s", $UNIX_DATE);
    $readable_date = substr($readable_date, 0, 10);
    echo "<td>".$readable_date."</td>";
    echo "<td>".$row['Runtime']."</td>";
    echo "<td>".$row['VoteAvg']."</td>";
    echo "<td>".$row['Popularity']."</td>";
    echo "</tr>";

}
}else{
  echo "Sorry! We couldn't find any films of that genre";
}

echo "</table>";

?>

