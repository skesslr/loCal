<center>
    <!--add folder form submission-->
    <span id="title" align="center"><?=$title?></span>
    <div id="body" align="center">This will only delete the folder, not its contents</div>
    <br></br>
    <form action="delete_folder.php" method="post">
        <fieldset>
            <div class="form-group">
                <input autocomplete="off" class="form-control" name="folder_name" placeholder="Folder Name" type="text"/>
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">
                    Delete
                </button>
            </div>
        </fieldset>
    </form>
</center>