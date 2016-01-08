<center>
<img alt="loCal" src="/img/logo.png"/></a>
</br>
</br>

<form action="login.php" method="post">
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    <script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail());
                                        
            // The ID token you need to pass to your backend:
            //var id_token = googleUser.getAuthResponse().id_token;
            //$.getJSON("search.php", parameters)
            //.done(function(data, textStatus, jqXHR) { 
            //);
        }
    </script>
    </br>
    <fieldset>
        <!--login submission form-->
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Log In
            </button>
        </div>
    </fieldset>
</form>

<div>
    or <a href="register.php">register</a> for an account
</div>

</center>