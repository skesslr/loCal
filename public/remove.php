<?php

    require("../includes/config.php");
    
    // delete rows with the calendar from history, calendars, tags, and folders
    CS50::query("DELETE FROM history WHERE calendar_id = ?", $_GET["id"]);
    CS50::query("DELETE FROM calendars WHERE id = ?", $_GET["id"]);
    CS50::query("DELETE FROM tags WHERE calendar_id = ?", $_GET["id"]);
    CS50::query("DELETE FROM folders WHERE calendar_id = ? AND user_id = ?", $_GET["id"], $_SESSION["id"]);
    
    // returnt to uploads page
    redirect("uploads.php");
    

?>