<?php

require_once('credentials.php');

$sql = "SELECT * FROM users WHERE Username = ? AND Password = ?;";
$stmt = $conn->prepare($sql);

$uname = $_GET['uname'];
$pword = $_GET['pword'];

$stmt->bind_param("ss", $uname, $pword);

$stmt->execute();
$result = $stmt->get_result();

$table = <<<TABLE
<table>
  <th>ID</th>
  <th>Username</th>
  <th>Password</th>
  <th>Firstname</th>
  <th>Lastname</th>
  <th>Wishlist</th>
TABLE;


if($result->num_rows > 0){
  echo $table;
while ($row = $result->fetch_assoc()) {
  
    echo "<tr>";
    echo "<td>".$row['ID']."</td>";
    echo "<td>".$row['Username']."</td>";
    echo "<td>".$row['Password']."</td>";
    echo "<td>".$row['Firstname']."</td>";
    echo "<td>".$row['Lastname']."</td>";
    echo "<td>".$row['Wishlist']."</td>";
    echo "</tr>";

}
}else{
  echo "Sorry! We couldn't find your details";
}

echo "</table>";

?>

