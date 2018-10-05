<form class="form-sr" action="login/employee" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}


        <div class="form-sr">
            <h5 for="username" style="color: #71b346">Employee Username</h5>
            <input type="Text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>

        <div class="form-sr">
            <h5 for="password" style="color: #71b346">Enter Password</h5>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>

        <!--Sign In Button -->
        <div class="form-sr mt-3">
            <button class="btn btn-lg btn-block btn-secondary" type="submit">Sign In</button>
        </div>
</form>