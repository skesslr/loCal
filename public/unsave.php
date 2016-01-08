<?php
    // configuration
    require("../includes/config.php");

    // remove history of user saving calendar
    CS50::query("DELETE FROM history WHERE calendar_id = ?", $_GET["id"]);
    redirect("/");
    

?>