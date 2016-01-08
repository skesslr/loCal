<?php
    // configuration
    require("../includes/config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("add_folder_form.php", ["title" => "Add Folder"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["folder_name"]))
        {
            apologize("Please enter a folder name");
        }
        else
        {
            // make sure folder is unique
            if (sizeof(CS50::query("SELECT * FROM folders WHERE folder_name = ? AND user_id = ?", $_POST["folder_name"], $_SESSION["id"])) > 0)
            {
                apologize("You already have a folder with this name");
            }
            else
            {
                // insert folder into folders
                CS50::query("INSERT INTO folders (folder_name, user_id) VALUES(?, ?)", $_POST["folder_name"], $_SESSION["id"]);
            }
        }
    }
    
    //open folder.php=?folder_name to view that folder
    redirect("folder.php?name=".$_POST["folder_name"]);
        
?>