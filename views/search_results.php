<div>
    <center>
        <div id="title">Search Results</div>
        
        <br></br>
        <div class="container">
            <table class="table table-bordered" align="center">
                <tr>
                <!--create headers-->
                    <th><h3>Calendar</h3></th>
                    <th><h3>Actions</h3></th>
                </tr> 
            
            <!--fill table with calendar info-->
            <?php foreach ($positions as $position): ?>
        
            <tr>
                <td><?= $position["calendar_name"] ?></td>
                <td><a href="view_cal.php?calendar_id=<?=$position["link"]?>">View</a> 
                | <a href="save.php?id=<?=$position["calendar_id"]?>">Save</a> 
                | <a href="share.php?calendar_link=<?=$position["link"]?>">Share</a></td>
            </tr>
        
            <?php endforeach ?>
            
            </table>
        </div>
    </center>
</div>
