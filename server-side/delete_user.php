<?php

require_once('credentials.php');

$sql = "DELETE users WHERE id = ?;";
$stmt = $conn->prepare($sql);

$uid = $_GET['user_id'];

$stmt->bind_param("i", $uid);
if($stmt->execute()){
    echo "User Deleted";
}else{
    echo "No User Of That ID Was Found";
}
        



?>