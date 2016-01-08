<?php

    // configuration
    require("../includes/config.php"); 
     
    // render calendar viewer with user-provided link
    render("calendar_viewer.php", ["calendar_id" => $_GET['calendar_id'], "title" => "Calendars"]);

?>