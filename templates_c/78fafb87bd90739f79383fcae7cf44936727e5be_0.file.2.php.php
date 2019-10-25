<?php
/* Smarty version 3.1.33, created on 2019-10-23 23:05:19
  from '/var/www/html/yourtube/templates/install/2.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db0b27fae8b61_70787912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78fafb87bd90739f79383fcae7cf44936727e5be' => 
    array (
      0 => '/var/www/html/yourtube/templates/install/2.php',
      1 => 1571861000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db0b27fae8b61_70787912 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <div class="card-body">
                            <h5 class="card-title">Choose name</h5>
                            <p class="card-text">This will be the name of your website.</p>

                            <form class="form" id="name-form" method='post' action='?step=3'>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" required class="form-control bg-dark border-dark" name="name" id="name" placeholder="The name of your website." value='<?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['name'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
'>
                                </div>
                                <button type="submit" href="" id="second-step" class="btn btn-back">Next <i class="fas fa-arrow-circle-right"></i></button>
                            </form>

                        </div><?php }
}
