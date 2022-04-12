<?php

require_once('credentials.php');

$sql = "INSERT INTO movies (TMDB_ID, IMDB_ID, Title, Overview, Revenue, Adult, Budget, Genres, Popularity, ReleaseDate, Runtime, Tagline, VoteAvg, VoteCount) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

$stmt = $conn->prepare($sql);

$tmdb_id = $_GET['tmdb_id'];
$imdb_id = $_GET['imdb_id'];
$title = $_GET['title'];
$overview = $_GET['overview'];
$rev = $_GET['rev'];
$adult = $_GET['adult'];
$bud = $_GET['budget'];
$gens = $_GET['genres'];
$pop = $_GET['pop'];
$date = $_GET['date']; //Format: d-m-yyyy
$runtime = $_GET['runtime'];
$tag = $_GET['tag'];
$vote_avg = $_GET['vote_avg'];
$vote_count = $_GET['vote_count'];

$date = 25569 + ($date / 86400);

$stmt->bind_param("iissiiisdiisdi", 
$tmdb_id, $imdb_id, $title, $overview, $rev, $adult, $bud, $gens, $pop, $date, $runtime, $tag, $vote_avg, $vote_count);
if($stmt->execute()){
    echo "Movie Added";
}else{
    echo "Error Adding Movie";
}



?>