<?php
///include header (which includes the navigation and viewport)

//all users have access to this page

// a scroll down form should be presented here to access the different if statements
// the form should do this by having diffferent ids to each optiom
// i.e id = "ratings" would be if user chooses ratings option

// there should be at least 7 different options to view the films which are:

    //genre 
    //selected year of release
    //budget range
    //generated revenue within a selected range
    //selected actors
    //selected director

    //this could be implemented as a search bar
    //specific film title, actor or director (i would go with title)

//These ifs trigger different sql statements, which all have a where clause
// these tables should also have and inner or outer joing depending on the id sent by the form
// if nothing is selected, use an else statment for a defualt select statment of the results

//the results should be viewed as cards or tables (no borders) to emmulate as much
// -as the orginal design daniel and faizaan had in mind
//relevant information should be shown, such as pictures, ratings, titles
//buttons should be available to see more information on each
            
    //all users should see a button to see the film's own webpage
    //links to different websites (extra)
    //if users are logged in a wishlist button should be available 
    


//include footer
?>