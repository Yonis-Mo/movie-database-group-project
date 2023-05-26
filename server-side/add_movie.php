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

$day = substr($date, 0, strpos($date, "-"));//start to first -
$month = substr($date, strpos($date, "-")+1, strrpos($date, "-")-3);//first - to last -
$year = substr($date, strrpos($date, "-")+1, strlen($date));//last - to end

$mk = mktime(0,0,0, $month, $day, $year);
$db_releasedate = intval(($mk/86400) + 25569);

//debug stmt
//http://localhost:82/Movie-Database/server-side/add_movie.php?tmdb_id=666&imdb_id=666&title=YEET&overview=gvhj&rev=9876543&adult=0&budget=1234567&genres=[{}]&pop=89&date=04-11-2020&runtime=120&tag=%20&vote_avg=20&vote_count=200

$stmt->bind_param("iissiiisdiisdi", 
$tmdb_id, $imdb_id, $title, $overview, $rev, $adult, $bud, $gens, $pop, $db_releasedate, $runtime, $tag, $vote_avg, $vote_count);

if($stmt->execute()){
    echo "Movie Added";
}else{
    echo "TMDB_ID and IMDB_ID both need to be unique";
}



?>