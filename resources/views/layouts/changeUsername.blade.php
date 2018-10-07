<form class="form-sr" action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group pb-3 pt-3 ">
        <label for="username" class="text-muted">Username <br><label style="color: #71b346;">* Must be at least 2 characters long, start with a letter and be alpha-numeric (only numbers and/or letters), max-length: 21. *</label></label>
        <input type="text" class="form-control transition-fade" style="text-align: center" id="username" name="username" placeholder="Username" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$">
    </div>

    <!--Sign In Button -->
    <div class="form-sr mt-3">
        <button class="btn btn-lg btn-block btn-secondary" type="submit">Sign In</button>
    </div>
</form>
