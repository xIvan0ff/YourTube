<?php
/* Smarty version 3.1.33, created on 2019-10-20 12:57:46
  from '/var/www/html/yourtube/templates/404.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dac2f9a1da172_97638029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e06cfe4865dab6228c752880889695f71a67e1d' => 
    array (
      0 => '/var/www/html/yourtube/templates/404.php',
      1 => 1571565445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dac2f9a1da172_97638029 (Smarty_Internal_Template $_smarty_tpl) {
?>            <div class="row h-75 justify-content-center text-center">
                <div class="col-8 col-md-6 my-auto">
                    <div class="card bg-dark">
                        <img class="card-img-top" src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['imgdir']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
/404.jpg" alt="404 Not Found">
                        <div class="card-body">
                            <h5 class="card-title">404: Not found</h5>
                            <p class="card-text">Page <code class="font-weight-bold"><?php ob_start();
echo $_smarty_tpl->tpl_vars['page']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</code> was not found. Maybe it was removed?</p>
                            <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['maindir']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
" class="btn btn-back">Go home</a>
                        </div>
                    </div>
                </div>
            </div><?php }
}
