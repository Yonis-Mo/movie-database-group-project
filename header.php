<?php
// until we make one:
// require_once "credentials.php";

// start/restart the session
session_start();



echo <<<_END

<!DOCTYPE html>
<html lang="en-GB" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/normal.css">
    <title>Taskit</title>
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <meta name="description" content="movie database is an online database of information related to films, television series,
    home video games, and streaming content online
   including cast , production crew.">



</head>

<body>
  
    <header>
       
        <img> <!-- design a logo and interst here -->
        <h1></h1> <!-- get a title and interst here-->
_END;
if (isset($_SESSION['loggedIn'])){
    if (isset($_SESSION['admin'])){
        // THIS PERSON IS LOGGED IN
       // show the logged in menu options:
    echo <<<_END
    <nav aria-label="main menu" id="nav">
       <ul>
           <li><a href="index.php"> Home </a> </li>
           <li><a href="admin.php">Admin</a> </li>
           <li><a href="user.php">My Watchlist</a> </li>
           <li><a href="logout.php"> Log Out</a> </li>
       </ul>
    </nav>
    _END;
    }else{
            // THIS PERSON IS LOGGED IN
           // show the logged in menu options:
echo <<<_END
        <nav aria-label="main menu" id="nav">
           <ul>
               <li><a href="index.php"> Home </a> </li>
               <li><a href="user.php">My Watchlist</a> </li>
               <li><a href="logout.php"> Log Out</a> </li>
           </ul>
       </nav>
_END;
    }
}
else{
echo <<<_END
              <nav aria-label="main menu" id="nav">
            <ul>
                <li><a href="index.php"> Home </a> </li>
                <li><a href="login.php"> Log In</a> </li>
                <li><a href="sign_up.php"> Sign Up</a> </li>
            </ul>
        </nav>
_END;
}
echo <<<_END
    </header>
    <main>
_END;

//make an html head viewport, inlude viewport, stylesheets and a description
//header, inlude logo, title, nav
//in the nave, pages should include for now:
// home: index to see all movies
// film specific page (when clicked)
// sign in page
// only home page should be live for now...
?>