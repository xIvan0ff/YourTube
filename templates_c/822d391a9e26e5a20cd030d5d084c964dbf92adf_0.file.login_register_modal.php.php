<?php
/* Smarty version 3.1.33, created on 2019-10-24 09:53:15
  from '/var/www/html/yourtube/templates/modals/login_register_modal.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db14a5bc4cad9_69479588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '822d391a9e26e5a20cd030d5d084c964dbf92adf' => 
    array (
      0 => '/var/www/html/yourtube/templates/modals/login_register_modal.php',
      1 => 1571899993,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db14a5bc4cad9_69479588 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal fade text-light" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
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
              <label for="login_user">Username or e-mail:</label>
              <input type="text" required class="form-control bg-dark border-dark" name="login_user" id="login_user" placeholder="Your username or e-mail.">
              <label for="login_password">Password:</label>
              <input type="password" required class="form-control bg-dark border-dark" name="login_password" id="login_password" placeholder="Your password.">
          </div>
          <button type="submit" class="btn btn-back">Sign in</button>
        </form>
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
        <h5 class="modal-title" id="registerModalLongTitle">Modal titlze</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <i class='fas fa-times'></i>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <span>Don't have an account? <a href="#" class="text-primary" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Sign In!</a></span>
        
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div><?php }
}
