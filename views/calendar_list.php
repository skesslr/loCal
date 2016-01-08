<div>
    
    <div id="title" align="center"><?= $title ?></div>
    
    <br></br>
    <div class="container">
        <table class="table table-bordered" align="center">
            <tr>
            <!--create headers-->
                <th><h3>Calendar</h3></th>
                <?php if($title == "My Uploaded Calendars"):?>
                <th><h3>Tags</h3></th>
                <?php endif ?>
                <th><h3>Folders</h3></th>
                <th><h3>Actions</h3></th>
            </tr> 
            
            <!--fill tables with calendar info-->
            <?php foreach ($positions as $position): ?>
                <tr>
                    <td><?= $position["calendar_name"] ?></td>
                    <?php if($title == "My Uploaded Calendars"):?>
                        <!--create unordered list of tags-->
                        <td><?php foreach ($position["tags"] as $tag): ?>
                                <li><?php print($tag["tag"])?></li>
                        <?php endforeach ?> </td>
                    <?php endif ?>
                    <!--create unordered list of tags-->
                    <td><?php foreach ($position["folders"] as $folder): ?>
                            <li><a href="folder.php?name=<?=$folder["folder_name"]?>"><?=$folder["folder_name"]?></a></li>
                    <?php endforeach ?></td>
                    <!--linked actions-->
                    <td><a href="view_cal.php?calendar_id=<?=$position["link"]?>">View</a> 
                    | <a href="share.php?calendar_link=<?=$position["link"]?>">Share</a>
                    <?php if($position["user_id"] == $_SESSION["id"]): ?>
                    | <a href="remove.php?id=<?=$position["calendar_id"]?>">Delete</a>
                    <?php endif ?>
                    <?php if($title == "My Saved Calendars"): ?>
                    | <a href="unsave.php?id=<?=$position["calendar_id"]?>">Unsave</a>
                    <?php else: ?>
                    | <a href="save.php?id=<?=$position["calendar_id"]?>">Save</a>
                    <?php endif ?>
                    | <a href="add_to_folder.php?id=<?=$position["calendar_id"]?>">Add to Folder</a>
                    <?php if($position["user_id"] == $_SESSION["id"]): ?>
                    | <a href="tag.php?id=<?=$position["calendar_id"]?>">Add Tag</a>
                    <?php endif ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
