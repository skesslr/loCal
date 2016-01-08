<center>
    <!--upload submission form-->
    <span id="title" align="center">Upload</span>
    <p>(*) Mandatory Fields</p>
    <form action="upload.php" method="post">
        <fieldset>
            <div class="form-group">
                <input autocomplete="off" autofocus class="form-control" name="calendar_name" placeholder="Calendar Name*" type="text"/>
            </div>
            <div class="form-group">
                <input class="form-control" name="link" placeholder="Calendar Address*" type="text"/>
            </div>
            <div class="form-group">
                <input class="form-control" name="tag" placeholder="Tag" type="text"/>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" rows="5" cols="25" placeholder="Description (< 255 characters)"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">
                    Upload
                </button>
            </div>
        
        </fieldset>
    </form>

    <div>
        <p>Make sure your calendar is "public," and find its address by going into your Google Calendar Settings:</p>
        <p>Settings > Calendars > Sharing > Calendar Details</p>
    </div>
</center>