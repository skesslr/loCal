<?php

    // configuration
    require("../includes/config.php"); 
    
    // store rows variable from SQL database holding a user's saved calendars
    $usercals = CS50::query("SELECT * FROM folders WHERE user_id = ? AND folder_name = ?", $_SESSION["id"], $_GET["name"]);
    if (sizeof($usercals) == 1)
    {
        apologize("This folder is currently empty");
    }
    else if(sizeof($usercals) == 0)
    {
        apologize("This folder does not exist");
    }
    
    // create a $positions array to hold calendar info
    $positions = [];
    foreach ($usercals as $usercal)
    {
        if ($usercal !== false)
        {
            // get calendar associated with row
            $calendars = CS50::query("SELECT * FROM calendars WHERE id = ?", $usercal["calendar_id"]);

            if (!empty($calendars))
            {
                $calendar = $calendars[0];
                
                // get tag info
                $tags = CS50::query("SELECT * FROM tags WHERE calendar_id = ?", $calendar["id"]);
                
                // get folder info
                $folders = CS50::query("SELECT * FROM folders WHERE calendar_id = ? AND user_id = ?", $calendar["id"], $_SESSION["id"]);
            
                // fill positions with folder and tag info given
                //if tags and folders are not empty, add both of them
                if (!empty($tags) && !empty($folders))
                {   
                    $positions[] = [
                        "tags" => $tags,
                        "folders" => $folders,
                        "user_id" => $calendar["user_id"],
                        "calendar_id" => $calendar["id"],
                        "calendar_name" => $calendar["calendar_name"],
                        "link" => $calendar["link"]
                    ];
                }
                //if just folders is empty, make it an empty array
                else if(!empty($tags))
                {
                    $positions[] = [
                        "tags" => $tags,
                        "folders" => [],
                        "user_id" => $calendar["user_id"],
                        "calendar_id" => $calendar["id"],
                        "calendar_name" => $calendar["calendar_name"],
                        "link" => $calendar["link"],
                    ];
                }
                //if just tags is empty, make it an empty array
                else if(!empty($folders))
                {
                   $positions[] = [
                        "tags" => [],
                        "folders" => $folders,
                        "user_id" => $calendar["user_id"],
                        "calendar_id" => $calendar["id"],
                        "calendar_name" => $calendar["calendar_name"],
                        "link" => $calendar["link"],
                    ]; 
                }
                // if tags and folders are both empty, make them both empty arrays
                else
                {
                   $positions[] = [
                        "tags" => [],
                        "folders" => [],
                        "user_id" => $calendar["user_id"],
                        "calendar_id" => $calendar["id"],
                        "calendar_name" => $calendar["calendar_name"],
                        "link" => $calendar["link"],
                    ];  
                }
            }
        }
    }
    
    // render portfolio w/ positions posted
    render("calendar_list.php", ["positions" => $positions, "title" => $_GET["name"]]);

?>