<?php
ob_start();

//add php to include header
include 'header.php';

$sign_up['username'] = $sign_up['password'] =  "";


echo "<h3> <b> Sign Up </b> </h3>";

if (isset($_SESSION['loggedIn']))
{
    header("location: index.php");

}

if (isset($_POST['username']))
{
    // connect directly to the database:
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // if the connection fails, allow this exit:
    if (!$connection)
    {
        die("Connection failed: " . $mysqli_connect_error);
    }
    
    // user just tried to sign up, try and insert these new details:

    // take copies of the credentials the user submitted:
    $username = $_POST['username'];
    $password = $_POST['password'];
 


   
    // try to insert the new details:
    $query = "INSERT INTO users (username, password, firstname, lastname, email, age, city, county, country, phone) 
    values ('$username', '$password', '$first_name', '$last_name', '$email', '$age',  '$city', '$county', '$country',  '$phone' )";
    
    $result = mysqli_query($connection, $query);

    // test for true(success)/false(failure):
    if ($result)
    {
        header("location: login.php");
    }
    else
    {
        // show an unsuccessful signup message:
        echo "<p><b>Sign up failed, please try again</b></p>";
    }
    
   
    
   

        // the following ifs means any erroneous entries show up so they can be amended when SS validation occurs
        if (isset($_POST["username"])) {
            $sign_up['username']=$_POST["username"];
        }

        if (isset($_POST["password"])) {
            $sign_up['password']=$_POST["password"];
        }

        // finished with the database, close the connection:
        mysqli_close($connection);
}




    echo <<<_END
<form action="sign_up.php" method="post">
  Username: <input type="text" name="username" value= "{$sign_up['username']}"> <b> $username_errors</b>
  <br>
  Password: <input type="text" name="password" id="password"" value= "{$sign_up['password']}"> <b> $password_errors</b>
  <br><input type="submit" value="Submit">
</form>	
_END;

include 'footer.php';
?>