<?php

require_once('credentials.php');

$sql = "SELECT REPLACE(REPLACE(REPLACE(Wishlist, '\"', ''), '[', '('), ']', ')') AS Wishlist FROM users WHERE ID = ?;";
$stmt = $conn->prepare($sql);

$id = $_GET['uid'];
$stmt->bind_param("i", $id);

$stmt->execute();
$result = $stmt->get_result();

$table = <<<TABLE
<table>
  <th>ID</th>
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
    //echo $table;
    while ($row = $result->fetch_assoc()) {
        $sql = "SELECT * FROM movies WHERE id IN ".$row['Wishlist'].";";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        echo $table;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
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
        echo "</table>";
    }
}else{
    echo "User Does Not Have Any Films In Their Wishlist";
}

?>