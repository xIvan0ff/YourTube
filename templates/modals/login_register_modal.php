<div class="modal fade text-light" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLongTitle">Sign In</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <i class='fas fa-times'></i>
        </button>
      </div>
      <div class="modal-body text-center">
        <form class="form" id="login-form" method='post'>
          <div class="form-group">
            <input type="hidden" id="login" name="login" value="1">
            <label for="login_user">Username or e-mail:</label>
            <input type="text" required class="form-control bg-dark border-dark" name="login_user" id="login_user" placeholder="Your username or e-mail.">
            <label for="login_password">Password:</label>
            <input type="password" required class="form-control bg-dark border-dark" name="login_password" id="login_password" placeholder="Your password.">
          </div>
          <button type="submit" class="btn btn-back">Sign in</button>
        </form>
        <p id="login-result"></p>
      </div>
      <div class="modal-footer">
        <span>Don't have an account? <a href="#" class="text-primary" data-dismiss="modal" data-toggle="modal" data-target="#registerModal">Sign Up!</a></span>
        
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade text-light" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLongTitle">Sign Up</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <i class='fas fa-times'></i>
        </button>
      </div>
      <div class="modal-body text-center">
        <form class="form" id="register-form" method='post'>
            <div class="form-group">
              <input type="hidden" id="register" name="register" value="1">
              <label for="register_user">Username:</label>
              <input type="text" required class="form-control bg-dark border-dark" name="register_user" id="register_user" placeholder="An username of your choice.">
              <label for="register_email">E-mail:</label>
              <input type="text" required class="form-control bg-dark border-dark" name="register_email" id="register_email" placeholder="An e-mail that you frequently use.">
              <label for="register_password">Password:</label>
              <input type="password" required class="form-control bg-dark border-dark" name="register_password" id="register_password" placeholder="A password you'll remember.">
            </div>
            <button type="submit" class="btn btn-back">Sign up</button>
          </form>
          <p id="register-result"></p>
      </div>
      <div class="modal-footer">
        <span>Already have an account? <a href="#" class="text-primary" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Sign In!</a></span>
      </div>
    </div>
  </div>
</div>