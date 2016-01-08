<center>
    <form action="share.php" method="post">
        <fieldset>
            
            <!--submissionform for recipient's email-->
            <div class="form-group">
                <input autocomplete="off" class="form-control" name="calendar_link" placeholder="Calendar Link" type="hidden" value=<?=$calendar_link?>>
            </div>
            <div class="form-group">
                <input autocomplete="off" autofocus class="form-control" name="email" placeholder="Recipient's Email" type="text"/>
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">
                    Send
                </button>
            </div>
        
        </fieldset>
    </form>
</center>