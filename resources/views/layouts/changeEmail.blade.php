<form class="form-sr" action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group pb-3">
        <label for="email " class="text-muted">Email address</label>
        <input type="email" class="form-control transition-fade" style="text-align: center"  id="email" name="email" placeholder="Email address" required>
    </div>

    <!--Sign In Button -->
    <div class="form-sr mt-3">
        <button class="btn btn-lg btn-block btn-secondary" type="submit">Sign In</button>
    </div>
</form>
