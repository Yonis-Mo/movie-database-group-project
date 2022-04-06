<?php

require_once('credentials.php');

$sql = "INSERT INTO users (Username, Password, Firstname, Lastname)
VALUES (?,?,?,?);";
$stmt = $conn->prepare($sql);

$uname = isset($_GET['username']) ? $_GET['username'] : "";
$pword = isset($_GET['password']) ? $_GET['password'] : "";
$fname = isset($_GET['firstname']) ? $_GET['firstname'] : "";
$lname = isset($_GET['lastname']) ? $_GET['lastname'] : "";

if($uname != "" || $pword != "" || $fname != "" || $lname != ""){
    $stmt->bind_param("ssss", $uname, $pword, $fname, $lname);

    if($stmt->execute()){
        echo "User Added";
    }else{
        echo "Error Adding User";
    }
        
}
else{
    echo "Sorry! Your detail's wern't captured properly!";
}


?>