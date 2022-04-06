<?php
include 'header.php';

echo '<h1> website name here! </h1>';



echo <<<_END
<br>
<div class= "sort">
<form action="index.php"  method="post">
  <label for="choice">Sorting Options: </label> <br>
  <select id="choice" name="choice" >
    <option> Select your option</option>
    <option value="#" name="#">1</option>
    <option value="#" name="#">2</option>
    <option value="#" name="#">3</option>
    <option value="#" name="#">4</option>
  </select>
  <button type="submit" value="Submit"> Sort</buttn>
</form>
</div>
<br>
_END;
// connect directly to the database:
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// if the connection fails, allow this exit:
    if (!$connection)
    {
        die("Connection failed: " . $mysqli_connect_error);
    }

 // Sort results
 if(isset($_POST['choice'])){
 if($_POST['choice'] =="1"){
 
 }
elseif($_POST['choice'] =="2"){

}
elseif($_POST['choice'] =="3"){
}
elseif($_POST['choice'] =="4"){

}
else{
 }
}
else{
   
     }

  // this query can return data:
  $result = mysqli_query($connection, $query);

    // number of rows that came back:
    $n = mysqli_num_rows($result);

      // if there are results then show them in a table:
        if ($n > 0)
        {
         
           for ($i=0; $i<$n; $i++)
            {
                
                // fetch one row as an associative array (elements named after columns):
                $row = mysqli_fetch_assoc($result);
               
                
               if($row["?"]){
                
                
                }
            }
           
        
        }
        else
        {
            // no favourites found...:
            echo "no posts found<br>";
        }
    
        // we're finished with the database, close the connection:
        mysqli_close($connection);


include 'footer.php';
?>