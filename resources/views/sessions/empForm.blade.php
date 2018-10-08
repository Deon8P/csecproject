<form class="form-sr" action="login/employee" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}


        <div class="form-sr">
            <h5 for="username" style="color: #71b346">Employee Username</h5>
            <input type="Text" class="form-control" id="username" name="username" placeholder="Username" required pattern=".{2,}">
        </div>

        <div class="form-sr">
            <h5 for="password" style="color: #71b346">Enter Password</h5>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
            <label style="color: #71b346"><input id="rememberEmployee" name="remember" value="true" type="checkbox" /> &nbsp;Remember me</label>
        </div>
        <!--
        <span id="imgCaptcha">{{!! captcha_img() !!}}</span>

        <button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh" onclick="refreshcaptcha()"></i></button>
        <script type="text/javascript">
            function refreshcaptcha() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("imgCaptcha").innerHTML = this.responseText;
                  }
                };
                xhttp.open("GET", "/refreshcaptcha", true);
                xhttp.send();
              }            
              </script>
        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
            -->
    <input id="captcha" type="text" class="form-control mb-2" placeholder="Enter Captcha" name="captcha" required>


        <!--Sign In Button -->
        <div class="form-sr mt-3">
            <button class="btn btn-lg btn-block btn-secondary" type="submit">Sign In</button>
        </div>
        <br>
</form>
