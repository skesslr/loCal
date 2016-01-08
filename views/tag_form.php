<center>
    <!--tag submission form-->
    <span id="title" align="center">Add Tags</span>
    <br></br>
    <form action="tag.php" method="post">
        <fieldset>
            <div class="form-group">
                <input autocomplete="off" class="form-control" name="calendar_id" type="hidden" value=<?=$calendar_id?>>
            </div>
            <div class="form-group">
                <input autocomplete="off" class="form-control" name="tag" placeholder="Tag" type="text"/>
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">
                    Tag Calendar
                </button>
            </div>
        </fieldset>
    </form>
</center>