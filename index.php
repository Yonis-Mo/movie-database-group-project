<?php
include 'header.php';

echo '<h1> The A-Team Movie Website </h1>';

echo <<<_END
<br>
<div class= "Genre">
<form action="index.php"  method="post">
  <label for="genre">Choose a Genre: </label> <br>
  <select id="genre" name="genre" >
    <option> Select your genre</option>
    <option value="action" name="Action">Action</option>
    <option value="romance" name="Romance">Romance</option>
    <option value="thriller" name="Thriller">Thriller</option>
    <option value="horror" name="Horror">Horror</option>
    <option value="crime" name="crime">Crime</option>
    <option value="western" name="western">Western</option>
    <option value="comedy" name="comedy">Comedy</option>
    <option value="drama" name="drama">Drama</option>
    <option value="foreign" name="foerign">Foreign</option>
    <option value="adventure" name="adventure">Adventure</option>
  </select>
  <button type="submit" value="Submit"> Sort</buttn>
</form>
</div>

<div class= "Year">
<form action="index.php"  method="post">
  <label for="year">Choose a Year: </label> <br>
  <select id="year" name="year" >
    <option> Select a year</option>
    <option value="1970s" name="1970s">1970-1980</option>
    <option value="1980s" name="1980s">1980-1990</option>
    <option value="1990s" name="1990s">1990-2000</option>
    <option value="2000s" name="2000s">2000-2010</option>
  </select>
  <button type="submit" value="Submit"> Sort</buttn>
</form>
</div>

<div class= "Budget">
<form action="index.php"  method="post">
  <label for="budget">Choose a Movie Budget: </label> <br>
  <select id="budget" name="budget" >
    <option> Select a budget</option>
    <option value="very_cheap" name="very_cheap">$0-$100,000</option>
    <option value="cheap" name="cheap">$100,000-$500,000</option>
    <option value="median" name="median">$500,000-$1,000,000</option>
    <option value="expensive" name="expensive">$1,000,000-$10,000,000</option>
  </select>
  <button type="submit" value="Submit"> Sort</buttn>
</form>
</div>

<div class= "Profit">
<form action="index.php"  method="post">
  <label for="profit">Choose a Profit Margin: </label> <br>
  <select id="profit" name="profit" >
    <option> Select a profit margin</option>
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


//default sql 
//SELECT * Films

 // Sort results
 if(isset($_POST['genre'])){
 if($_POST['genre'] =="action"){
   $sql = "SELECT * FROM movies 
   WHERE genres Like '%action%'";
 
 }
elseif($_POST['genre'] =="romance"){
  $sql = "SELECT * FROM movies 
  WHERE genres Like '%romance%'";
}
elseif($_POST['genre'] =="thriller"){
  $sql = "SELECT * FROM movies 
  WHERE genres Like '%thriller%'";

}
elseif($_POST['genre'] =="horror"){
  $sql = "SELECT * FROM movies 
  WHERE genres Like '%horror%'";

}
elseif($_POST['genre'] =="crime"){
  $sql = "SELECT * FROM movies 
  WHERE genres Like '%crime%'";

}
elseif($_POST['genre'] =="western"){
  $sql = "SELECT * FROM movies 
  WHERE genres Like '%western%'";

}
elseif($_POST['genre'] =="comedy"){
  $sql = "SELECT * FROM movies 
  WHERE genres Like '%comedy%'";
}
elseif($_POST['genre'] =="drama"){
  $sql = "SELECT * FROM movies 
  WHERE genres Like '%drama%'";

}
elseif($_POST['genre'] =="foreign"){
  $sql = "SELECT * FROM movies 
  WHERE genres Like '%foreign%'";

}
elseif($_POST['genre'] =="adventure"){
  $sql = "SELECT * FROM movies 
  WHERE genres Like '%adventure%'";

}

   
     }

     //code to format date from database
    //  $UNIX_DATE =($row['ReleaseDate']-25569)*86400; 
    //  $readable_date = gmdate("d-m-y", $UNIX_DATE); 

     if(isset($_POST['year'])){
      if($_POST['year'] =="1970s"){
        
        $sql="SELECT * FROM movies WHERE ReleaseDate < '29557' AND ReleaseDate > '25557' ORDER BY Budget DESC;";
      
      }
     elseif($_POST['year'] =="1980s"){
      $sql="SELECT * FROM movies WHERE ReleaseDate < '32957' AND ReleaseDate > '29557' ORDER BY Budget DESC;";
     
     }
     elseif($_POST['year'] =="1990s"){
      $sql="SELECT * FROM movies WHERE ReleaseDate < '36457' AND ReleaseDate > '32957' ORDER BY Budget DESC;";
     }
     elseif($_POST['year'] =="2000s"){
      $sql="SELECT * FROM movies WHERE ReleaseDate < '40297' AND ReleaseDate > '36457' ORDER BY Budget DESC;";
     
     }

        
          }

          if(isset($_POST['budget'])){
            if($_POST['budget'] =="very_cheap"){
              $sql="SELECT * FROM movies WHERE Budget < '100000' AND Budget > '0' ORDER BY Budget DESC;";
            
            }
           elseif($_POST['budget'] =="cheap"){
            $sql="SELECT * FROM movies WHERE Budget < '500000' AND Budget > '100000' ORDER BY Budget DESC;";
           
           }
           elseif($_POST['budget'] =="median"){
            $sql="SELECT * FROM movies WHERE Budget < '1000000' AND Budget > '500000' ORDER BY Budget DESC;";
           }
           elseif($_POST['budget'] =="expensive"){
            $sql="SELECT * FROM movies WHERE Budget < '1000000' AND Budget > '1000000' ORDER BY Budget DESC;";
           
           }

              
                }

                if(isset($_POST['profit'])){
                  if($_POST['profit'] =="very_poor"){
                    $sql="SELECT * FROM movies WHERE Revenue < '100000' AND Revenue > '0' ORDER BY Revenue DESC;";
                  
                  }
                 elseif($_POST['profit'] =="poor"){
                  $sql="SELECT * FROM movies WHERE Revenue < '500000' AND Revenue > '100000' ORDER BY Revenue DESC;";
                 
                 }
                 elseif($_POST['profit'] =="good"){
                  $sql="SELECT * FROM movies WHERE Revenue < '1000000' AND Revenue > '500000' ORDER BY Revenue DESC;";
                 }
                 elseif($_POST['profit'] =="great"){
                  $sql="SELECT * FROM movies WHERE Revenue < '10000000' AND Revenue > '1000000' ORDER BY Revenue DESC;";
                 
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
