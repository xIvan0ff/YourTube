<?php
/* Smarty version 3.1.33, created on 2019-10-23 23:25:46
  from '/var/www/html/yourtube/templates/footer.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db0b74a68a368_93961836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7d98d071d0fb48e3ddfb5f5a13fb80b0496657e' => 
    array (
      0 => '/var/www/html/yourtube/templates/footer.php',
      1 => 1571862340,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modals/login_register_modal.php' => 1,
  ),
),false)) {
function content_5db0b74a68a368_93961836 (Smarty_Internal_Template $_smarty_tpl) {
?>            </div>
        </div>
        <?php if (isset($_SESSION['account'])) {?>
        <?php } else { ?>
            <?php $_smarty_tpl->_subTemplateRender("file:modals/login_register_modal.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php echo '<script'; ?>
 src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['customdir']->value;
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
/js/login_register_ajax.js"><?php echo '</script'; ?>
>
        <?php }?>
        <footer class="footer footer-dark bg-dark fixed-bottom">
            <div class="container d-block d-md-none">
                <div class="row justify-content-center text-center">
                    <div class="col">
                     <a class="btn btn-main"><i class="fas fa-adjust"></i></a>
                    </div>
                </div>
            </div>
            <div class="container d-none d-md-block">
                <div class="row">
                    <div class="col text-left">
                        asd
                    </div>
                    <div class="col text-right">
                        asd
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html><?php }
}
