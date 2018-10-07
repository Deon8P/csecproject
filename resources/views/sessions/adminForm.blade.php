<form class="form-sr" action="login/admin" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }}

        <div class="form-sr">
            <h5 for="username" style="color: #71b346">Admin Username</h5>
            <input type="Text" class="form-control" id="username" name="username" placeholder="Username" required pattern=".{2,}">
        </div>

        <div class="form-sr">
            <h5 for="password" style="color: #71b346">Enter Password</h5>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
            <label style="color: #71b346"><input id="rememberAdmin" name="remember" value="false" type="checkbox" /> &nbsp;Remember me</label>
        </div>

        <!--Sign In Button -->
        <div class="form-sr mt-3">
            <button class="btn btn-lg btn-block btn-secondary" type="submit">Sign In</button>
        </div>

        <a href="/register" style="color: #71b346">Register</a>
</form>
