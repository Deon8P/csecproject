<form class="form-sr" action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group pb-3">
        <label for="password " class="text-muted">Password <br><label style="color: #71b346;">* Must be longer than 6 characters and contain at least one upper and lower case letter as well as a number. *</label></label>
        <input type="password" class="form-control transition-fade" style="text-align: center"  id="password" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
    </div>

    <div class="form-group pb-3">
        <label for="password_confirmation " class="text-muted">Password confirmation</label>
        <input type="password" class="form-control transition-fade" style="text-align: center"  id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" required pattern=".{6,}">
    </div>
    </div>

    <!--Sign In Button -->
    <div class="form-sr mt-3">
        <button class="btn btn-lg btn-block btn-secondary" type="submit">Sign In</button>
    </div>
</form>
