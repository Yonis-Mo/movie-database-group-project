<?php

require_once('credentials.php');

$search_by = $_GET['search_by'];    //"budget" or "revenue"
$max = isset($_GET['max']) ? $_GET['max'] : 20000000; //Default = 20,000,000
$min = isset($_GET['min']) ? $_GET['min'] : 15000000; //Default = 15,000,000


if($search_by == "budget"){
    //SEARCH FOR FILMS WITHIN SPECIFIC BUDGET
    $sql = "SELECT * FROM movies WHERE Budget < ? AND Budget > ? ORDER BY Budget DESC;";
}
elseif ($search_by == "revenue"){
    //SEARCH FOR FILMS WITHIN SPECIFIC REVENUE
    $sql = "SELECT * FROM movies WHERE Revenue < ? AND Revenue > ? ORDER BY Revenue DESC;";
}

if(isset($sql)){
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $max, $min);
  
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
  
}else{
  echo "search_by needs to be either 'revenue' or 'budget'";
}

?>

