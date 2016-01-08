<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("upload_form.php", ["title" => "Upload"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["calendar_name"]))
        {
            apologize("You must provide a Calendar Name.");
        }
        if (empty($_POST["link"]))
        {
            apologize("You must provide a Calendar Link.");
        }
        else
        {
            $link = urlencode($_POST["link"]);
        }
        
        //make sure submission is unique
        $rows = CS50::query("SELECT * FROM calendars WHERE link = ?", $link);
        if (count($rows) == 1)
        {
            apologize("This calendar has already been uploaded");
        }
        
        //make sure submission is unique
        $rows = CS50::query("SELECT * FROM calendars WHERE calendar_name = ?", $_POST["calendar_name"]);
        if (count($rows) == 1)
        {
            apologize("This calendar name is already in use");
        }
        
        // insert calendar into calendars database
        if (empty($_POST["tag"]))
        {
            CS50::query("INSERT INTO calendars (user_id, calendar_name, link) VALUES(?, ?, ?)", 
            $_SESSION["id"], 
            $_POST["calendar_name"], 
            $link); 
        }
        else
        {
            // insert into calendars database
            CS50::query("INSERT INTO calendars (user_id, calendar_name, link) VALUES(?, ?, ?)", 
            $_SESSION["id"], 
            $_POST["calendar_name"], 
            $link);
        
            $cals = CS50::query("SELECT * FROM calendars WHERE calendar_name = ?", $_POST["calendar_name"]);
            
            
            // insert tag and calendar into tags database
            CS50::query("INSERT INTO tags (calendar_id, tag) VALUES(?, ?)",
            $cals[0]["id"],
            $_POST["tag"]);
        }
        
        // redirect back
        redirect("uploads.php");
    }

?>
