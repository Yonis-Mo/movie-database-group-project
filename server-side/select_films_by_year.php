<?php

require_once('credentials.php');

$sql = "SELECT * FROM movies WHERE ReleaseDate > ? AND ReleaseDate < ?;";
$stmt = $conn->prepare($sql);

$min_year = strtotime($_GET['min_year']);
$max_year = strtotime($_GET['max_year']);
//EXPECTING DATES PASSED IN FORMAT(D-M-YYYY)

// $min_year = strtotime("1-1-2010");
// $max_year = strtotime("31-12-2015");

$max_year = 25569 + ($max_year / 86400);
$min_year = 25569 + ($min_year / 86400);

$stmt->bind_param("ii", $min_year, $max_year);

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
    $readable_date = gmdate("d-m-Y", $UNIX_DATE);

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