<?php
echo "<!DOCTYPE html>";
echo <<<_END

<!DOCTYPE html>
<html lang="en-GB" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sketchy/bootstrap.min.css" integrity="sha384-RxqHG2ilm4r6aFRpGmBbGTjsqwfqHOKy1ArsMhHusnRO47jcGqpIQqlQK/kmGy9R" crossorigin="anonymous">
    <link id="stylesheet" rel="stylesheet" href="css/taskit.css"> <!--make this dependant on session value -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Taskit</title>
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <meta name="description" content="TaskIt! a community website that users can post anything on a virtual community notice board">
</head>

_END; 
echo <<<_END
<body>
<h1> hello world </h1>
</body>
_END;

//make an html head viewport, inlude viewport, stylesheets and a description
//header, inlude logo, title, nav
//in the nave, pages should include for now:
// home: index to see all movies
// film specific page (when clicked)
// sign in page
// only home page should be live for now...
?>
