<?php
/* Smarty version 3.1.33, created on 2019-10-24 22:44:45
  from '/var/www/html/yourtube/templates/install/6.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db1ff2dc81715_07331795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76eff709b414193cef1f79c969131456ff11d924' => 
    array (
      0 => '/var/www/html/yourtube/templates/install/6.php',
      1 => 1571946284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db1ff2dc81715_07331795 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <div class="card-body">
                            <h5 class="card-title">Install Completed</h5>
                            <p class="card-text"><?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['name'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
 was successfully installed.</p>
                            <p>You may sign in with username <kbd class="text-primary">admin</kbd> and password <kbd class="text-primary">password</kbd>.</p>
                            <form class="form" id="final-form" method='post' action="">
                                <input type="hidden" id="installed" name="installed" value="1">
                                <button type="submit" href="" id="sixth-step" class="btn btn-back">Finish <i class="fas fa-clipboard-check"></i></button>
                            </form>
                            <div>
                        </div><?php }
}
