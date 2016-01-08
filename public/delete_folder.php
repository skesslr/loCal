<?php
    // configuration
    require("../includes/config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("delete_folder_form.php", ["title" => "Delete Folder"]);
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
            // make sure folder hasn't been deleted, then delete it
            if (sizeof(CS50::query("SELECT * FROM folders WHERE folder_name = ? AND user_id = ?", $_POST["folder_name"], $_SESSION["id"])) == 0)
            {
                apologize("This folder does not exist or has already been deleted");
            }
            else
            {
                CS50::query("DELETE FROM folders WHERE folder_name = ? AND user_id = ?", $_POST["folder_name"], $_SESSION["id"]);
            }
        }
    }
    
    // return to home page
    redirect("/");
        
?>