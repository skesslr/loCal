<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("share_form.php", ["calendar_link" => $_GET["calendar_link"], "title" => "Share"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["email"]))
        {
            apologize("You must provide a recipient.");
        }
        
        // render confirmation page
        render("share_confirmation.php", ["calendar_link" => $_POST["calendar_link"], "email" => $_POST["email"]]);
    }

?>
