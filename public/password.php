<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("password_form.php", ["title" => "Change Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // validate submission
        if (empty($_POST["curpassword"]))
        {
            apologize("You must provide your current password.");
        }
        // error if any field is empty
        else if (empty($_POST["newpassword"]) || empty($_POST["confirmation"]))
        {
            apologize("You must provide a new password and confirmation.");
        }
        // error if the password and confirmation do not match
        else if ($_POST["newpassword"] != $_POST["confirmation"])
        {
            apologize("You must provide the same new password twice.");
        }
        
        // query database for user
        $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        $row = $rows[0];
        
        // validate password
        if (password_verify($_POST["curpassword"], $row["hash"]))
        {
            // update password
            $result = CS50::query("UPDATE users SET hash = ? WHERE id = ?", password_hash($_POST["newpassword"], PASSWORD_DEFAULT), $_SESSION["id"]);
                
            // redirect to index.php
            redirect("/index.php");
        }
        else
        {
            apologize("Incorrect password.");
        }
    }

?>