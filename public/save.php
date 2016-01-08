<?php

    // configuration
    require("../includes/config.php"); 
    
    //checks if calendar is already saved
    $cals = CS50::query("SELECT * FROM history WHERE user_id =? AND calendar_id = ?", $_SESSION["id"], $_GET["id"]);
    if (sizeof($cals) == 0)
    {
        // if not yet saved, saves calendar
        CS50::query("INSERT INTO history (user_id, calendar_id) VALUES( ?, ?)", $_SESSION["id"], $_GET["id"]);
    }
    else
    {
        // if already saved, user is notified
        apologize("You have already saved this calendar!");
    }
    // render calendar viewer with user-provided link
    redirect("/");

?>