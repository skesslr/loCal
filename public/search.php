<?php

    // configuration
    require(__DIR__ . "/../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("search_form.php", ["title" => "Search"]);
    }
    
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["input"]))
        {
            apologize("Please enter a search term");
        }
        
        // creates an array of results with direct matches
        $rows = CS50::query("SELECT * FROM calendars WHERE calendar_name = ?", $_POST["input"]);
        
        // fill positions with calendar info with matching names
        $positions = [];
        foreach ($rows as $row)
        {
            if ($row !== false)
            {
                $positions[] = [
                    "calendar_id" => $row["id"],
                    "calendar_name" => $row["calendar_name"],
                    "link" => $row["link"]
                ];
            }
        }
        
        // find calendars with matching tags 
        $rows2 = CS50::query("SELECT * FROM tags WHERE tag = ?", $_POST["input"]);
        
        // go through calendars with matching tags
        foreach ($rows2 as $row2)
        {
            if ($row2 !== false)
            {
                // store calendar info
                $cal = CS50::query("SELECT * FROM calendars WHERE id = ?", $row2["calendar_id"]);
                
                // create a count of calendars
                $exists = 0;
                
                // make sure the calendar info is not already loaded in
                foreach ($positions as $position)
                {
                    if ($position["calendar_name"] == $row2["tag"])
                    {
                        $exists++;
                    }
                }
                if ($exists == 0)
                {
                    // upload calendar info for calendars 
                    $positions[] = [
                        "calendar_id" => $cal[0]["id"],
                        "calendar_name" => $cal[0]["calendar_name"],
                        "link" => $cal[0]["link"]
                    ];
                    
                    $exists = 0;
                }
                else
                {
                    $exists = 0;
                }
            }
        }
        
        // make sure there is at least one calendar loaded
        if (empty($positions))
        {
            apologize("We could not find any calendars matching your search.");
        }
            
        // redirect back
        render("search_results.php", ["positions" => $positions, "title" => "Search Results"]);
    }
    
?>