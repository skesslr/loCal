<?php

    // configuration
    require("../includes/config.php"); 
    
    // store rows variable from SQL database holding a user's saved calendars
    $usercals = CS50::query("SELECT * FROM history WHERE user_id = ?", $_SESSION["id"]);
    // no saved calendars if usercals is empty
    if (sizeof($usercals) == 0)
    {
        apologize("You have not saved any calendars yet!");
    }
    
    // fill positions with info on all saved
    $positions = [];
    foreach ($usercals as $usercal)
    {
        if ($usercal !== false)
        {
            // get calendar associated with row
            $calendars = CS50::query("SELECT * FROM calendars WHERE id = ?", $usercal["calendar_id"]);
            //echo sizeof($usercal["link"]);
            if (!empty($calendars))
            {
                $calendar = $calendars[0];
                
                // get user's folders
                $folders = CS50::query("SELECT * FROM folders WHERE calendar_id = ? AND user_id = ?", $calendar["id"], $_SESSION["id"]);
                
                // fill positions with folder info if some folders exist
                if (!empty($folders))
                {   
                    $positions[] = [
                        "folders" => $folders,
                        "user_id" => $calendar["user_id"],
                        "calendar_id" => $calendar["id"],
                        "calendar_name" => $calendar["calendar_name"],
                        "link" => $calendar["link"]
                    ];
                }
                // if no folders exist, make folders = []
                else
                {
                    $positions[] = [
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
    
    // render portfolio
    render("calendar_list.php", ["positions" => $positions, "title" => "My Saved Calendars"]);

?>