<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("tag_form.php", ["calendar_id" => $_GET["id"], "title" => "Tag"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["calendar_id"]))
        {
            apologize("You must provide a calendar id.");
        }
        if (empty($_POST["tag"]))
        {
            apologize("You must provide a tag.");
        }
        
        //make sure submission is unique
        $rows = CS50::query("SELECT * FROM tags WHERE tag = ? AND calendar_id = ?", $_POST["tag"], $_POST["calendar_id"]);
        if (count($rows) == 1)
        {
            apologize("This calendar already has this tag.");
        }
        $cals = CS50::query("SELECT * FROM calendars WHERE id = ?", urldecode($_POST["calendar_id"]));
        if (count($cals) == 0)
        {
            apologize("We don't have this calendar yet.".($_POST["calendar_id"]));
        }
        
        // ensure user is the one who uploaded the calendar
        $users = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        if ( $users[0]["id"] == $cals[0]["user_id"])
        {
            // Insert new tag
            CS50::query("INSERT INTO tags (tag, calendar_id) VALUES(?, ?)", 
            $_POST["tag"],
            $cals[0]["id"]);
        }
        else
        {
            apologize("Only the uploader can add tags to a calendar.");
        }
        
        // redirect back
        redirect("uploads.php");
    }

?>
