<?php

require_once('credentials.php');

// $sql = "SELECT REPLACE(REPLACE(REPLACE(Wishlist, '\"', ''), '[', ''), ']', '') AS Wishlist FROM users WHERE ID = ?;";
$sql = "SELECT REPLACE(REPLACE(REPLACE(Wishlist, '\"', ''), '[', '('), ']', ')') AS Wishlist FROM users WHERE ID = ?;";
$stmt = $conn->prepare($sql);

$id = $_GET['uid'];
$stmt->bind_param("i", $id);

$stmt->execute();
$result = $stmt->get_result();



if($result->num_rows > 0){
    //echo $table;
    while ($row = $result->fetch_assoc()) {
        $sql = "SELECT * FROM movies WHERE id IN ".$row['Wishlist'].";";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo $row['Title'];
        }
    }
}else{
    echo "User Does Not Have Any Films In Their Wishlist";
}

?>