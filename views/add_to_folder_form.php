<center>
    <!--add folder form submission-->
    <span id="title" align="center">Add to Folder</span>
    <br></br>
    <form action="add_to_folder.php" method="post">
        <fieldset>
            <div class="form-group">
                <input autocomplete="off" class="form-control" name="calendar_id" placeholder="Calendar ID" type="hidden" value=<?=$calendar_id?>>
            </div>
            <div class="form-group">
                <input autocomplete="off" class="form-control" name="folder_name" placeholder="Folder Name" type="text"/>
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">
                    Add
                </button>
            </div>
        </fieldset>
    </form>
</center>