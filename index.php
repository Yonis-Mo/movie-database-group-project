<?php
include 'header.php';

echo '<h1> The A-Team Movie Website </h1>';

echo <<<_END
<br>
<div class= "sort">
<form action="index.php"  method="post">
  <label for="choice">Choose a Genre: </label> <br>
  <select id="choice" name="choice" >
    <option> Select your option</option>
    <option value="action" name="Action">Action</option>
    <option value="romance" name="Romance">Romance</option>
    <option value="thriller" name="Thriller">Thriller</option>
    <option value="horror" name="Horror">Horror</option>
  </select>
  <button type="submit" value="Submit"> Sort</buttn>
</form>
</div>

<div class= "sort">
<form action="index.php"  method="post">
  <label for="choice">Choose a Year: </label> <br>
  <select id="choice" name="choice" >
    <option> Select your option</option>
    <option value="1970s" name="1970s">1970-1980</option>
    <option value="1980s" name="1980s">1980-1990</option>
    <option value="1990s" name="1990s">1990-2000</option>
    <option value="2000s" name="2000s">2000-2010</option>
  </select>
  <button type="submit" value="Submit"> Sort</buttn>
</form>
</div>

<div class= "sort">
<form action="index.php"  method="post">
  <label for="choice">Choose a Movie Budget: </label> <br>
  <select id="choice" name="choice" >
    <option> Select your option</option>
    <option value="very_cheap" name="very_cheap">$0-$100,000</option>
    <option value="cheap" name="cheap">$100,000-$500,000</option>
    <option value="median" name="median">$500,000-$1,000,000</option>
    <option value="expensive" name="expensive">$1,000,000-$10,000,000</option>
  </select>
  <button type="submit" value="Submit"> Sort</buttn>
</form>
</div>

<div class= "sort">
<form action="index.php"  method="post">
  <label for="choice">Choose a Profit Margin: </label> <br>
  <select id="choice" name="choice" >
    <option> Select your option</option>
    <option value="very_poor" name="very_poor">$0-$100,000</option>
    <option value="poor" name="poor">$100,000-$500,000</option>
    <option value="good" name="good">$500,000-$1,000,000</option>
    <option value="great" name="great">$1,000,000-$10,000,000</option>
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