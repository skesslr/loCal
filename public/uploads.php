<?php

    // configuration
    require("../includes/config.php"); 
    
    // store rows variable from SQL database holding a user's saved calendars
    $rows = CS50::query("SELECT * FROM calendars WHERE user_id = ?", $_SESSION["id"]);
    if (sizeof($rows) == 0)
    {
        apologize("You have not uploaded any calendars yet!");
    }
    
    $positions = [];
    // fill positions with tags and calendars info from rows above
    foreach ($rows as $row)
    {;
        if ($row !== false)
        {
            // finds user's tags and folders
            $tags = CS50::query("SELECT * FROM tags WHERE calendar_id = ?", $row["id"]);
            $folders = CS50::query("SELECT * FROM folders WHERE calendar_id = ? AND user_id = ?", $row["id"], $_SESSION["id"]);
            
            // if tags and folders both exist, enter them both into positions
            if (!empty($tags) && !empty($folders))
            {   
                $positions[] = [
                    "tags" => $tags,
                    "folders" => $folders,
                    "user_id" => $row["user_id"],
                    "calendar_id" => $row["id"],
                    "calendar_name" => $row["calendar_name"],
                    "link" => $row["link"]
                ];
            }
            // if just folders is empty, pass it as []
            else if(!empty($tags))
            {
                $positions[] = [
                    "tags" => $tags,
                    "folders" => [],
                    "user_id" => $row["user_id"],
                    "calendar_id" => $row["id"],
                    "calendar_name" => $row["calendar_name"],
                    "link" => $row["link"],
                ];
            }
            // if just tags is empty, pass it as []
            else if(!empty($folders))
            {
               $positions[] = [
                    "tags" => [],
                    "folders" => $folders,
                    "user_id" => $row["user_id"],
                    "calendar_id" => $row["id"],
                    "calendar_name" => $row["calendar_name"],
                    "link" => $row["link"],
                ]; 
            }
            //if folders and tags are both empty, pass both as []
            else
            {
               $positions[] = [
                    "tags" => [],
                    "folders" => [],
                    "user_id" => $row["user_id"],
                    "calendar_id" => $row["id"],
                    "calendar_name" => $row["calendar_name"],
                    "link" => $row["link"],
                ];  
            }
        }
    }
    
    // render portfolio, posting positions
    render("calendar_list.php", ["positions" => $positions, "title" => "My Uploaded Calendars"]);

?>