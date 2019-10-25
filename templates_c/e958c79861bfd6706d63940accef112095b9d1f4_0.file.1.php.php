<?php
/* Smarty version 3.1.33, created on 2019-10-20 13:12:21
  from '/var/www/html/yourtube/templates/install/1.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dac33052ee157_58892996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e958c79861bfd6706d63940accef112095b9d1f4' => 
    array (
      0 => '/var/www/html/yourtube/templates/install/1.php',
      1 => 1571566340,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dac33052ee157_58892996 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <div class="card-body">
                            <h5 class="card-title">Install <?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['name'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</h5>
                            <p class="card-text">Greetings! You've got <?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['name'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
 running on your webserver! Now it's time to install it!</p>
                            <a role="button" href="?step=2" id="first-step" class="btn btn-back">Let's do it! <i class="fas fa-arrow-circle-right"></i></a>
                        </div><?php }
}
