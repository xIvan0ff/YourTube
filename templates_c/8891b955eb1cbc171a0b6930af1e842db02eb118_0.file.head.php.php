<?php
/* Smarty version 3.1.33, created on 2019-10-23 23:29:50
  from '/var/www/html/yourtube/templates/head.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db0b83e5b8fe0_57989502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8891b955eb1cbc171a0b6930af1e842db02eb118' => 
    array (
      0 => '/var/www/html/yourtube/templates/head.php',
      1 => 1571862589,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db0b83e5b8fe0_57989502 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://unpkg.com/popper.js@1.16.0/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/10d7a16c5b.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"><?php echo '</script'; ?>
>

        <!-- CUSTOM -->
        <link href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['customdir']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
/css/style.css" rel="stylesheet" />
        <link href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['customdir']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
/css/sidebar.css" rel="stylesheet" />
        <?php if ($_smarty_tpl->tpl_vars['display_sidebar']->value) {?>
            <link href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['customdir']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
/css/sidebar_page.css" rel="stylesheet" />
        <?php }?>
        <?php echo '<script'; ?>
 src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['customdir']->value;
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
/js/sidebar.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            var maindir = '<?php echo $_smarty_tpl->tpl_vars['maindir']->value;?>
';
            var customdir = '<?php echo $_smarty_tpl->tpl_vars['customdir']->value;?>
';
            var imgdir = '<?php echo $_smarty_tpl->tpl_vars['imgdir']->value;?>
';
        <?php echo '</script'; ?>
>
    </head>
    <body><?php }
}
