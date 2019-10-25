<?php
/* Smarty version 3.1.33, created on 2019-10-23 23:05:21
  from '/var/www/html/yourtube/templates/install/3.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db0b281487fd2_16597604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5cf18c5f3590a35a4345f4f26dd69b804eea0e6' => 
    array (
      0 => '/var/www/html/yourtube/templates/install/3.php',
      1 => 1571861018,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db0b281487fd2_16597604 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <div class="card-body">
                            <h5 class="card-title">Administrator Password</h5>
                            <p class="card-text">This will be password used for administrative operations.</p>

                            <form class="form" id="password-form" method='post' action='?step=4'>
                                <div class="form-group">
                                    <label for="adminpass">Administrator Password:</label>
                                    <input type="password" required class="form-control bg-dark border-dark" name="adminpass" id="adminpass" placeholder="Enter an administrator password." value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['adminpass'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
">
                                </div>
                                <button type="submit" href="" id="second-step" class="btn btn-back">Next <i class="fas fa-arrow-circle-right"></i></button>
                            </form>

                        </div><?php }
}
