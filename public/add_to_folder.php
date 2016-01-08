<?php
    // configuration
    require("../includes/config.php");
   
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("add_to_folder_form.php", ["calendar_id" => $_GET["id"], "title" => "Add to Folder"]);
    }
    
    // if user submitted input
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // make sure folder exists
        $exists = CS50::query("SELECT * FROM folders WHERE user_id = ? AND folder_name = ?", $_SESSION["id"], $_POST["folder_name"]);
        if (sizeof($exists) == 0)
        {
            apologize("This folder does not exist, please create it first");
        }
        
        // put calendar into folder if not already there
        $duplicate = CS50::query("SELECT * FROM folders WHERE user_id = ? AND folder_name = ? AND calendar_id = ?", $_SESSION["id"], $_POST["folder_name"], $_POST["calendar_id"]);
        if (sizeof($duplicate) == 0)
        {
            CS50::query("INSERT INTO folders (folder_name, user_id, calendar_id) VALUES(?, ?, ?)", $_POST["folder_name"], $_SESSION["id"], $_POST["calendar_id"]);
        }
        else
        {
            apologize("Calendar is already in this folder");
        }
        
        // go to folder page
        redirect("folder.php?name=".$_POST["folder_name"]);
    }

?>