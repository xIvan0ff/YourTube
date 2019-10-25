<?php
/* Smarty version 3.1.33, created on 2019-10-23 22:46:11
  from '/var/www/html/yourtube/templates/nav.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db0ae036e3595_75912799',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef0a80cf7e44b424e39a4a75cce76a07fc4299f3' => 
    array (
      0 => '/var/www/html/yourtube/templates/nav.php',
      1 => 1571859970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db0ae036e3595_75912799 (Smarty_Internal_Template $_smarty_tpl) {
?>                <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <div class="container-fluid justify-content-between<?php if ($_smarty_tpl->tpl_vars['nav_center']->value) {?> justify-content-lg-center<?php }?>">   
                        <div>
                            <a role="button" id="sidebarCollapse" class="btn btn-main rounded-circle d-none mr-3<?php if ($_smarty_tpl->tpl_vars['nav_center']->value) {?> d-md-none<?php } else { ?> d-md-inline-block<?php }?>">
                                <i id="nav-icon" class="fas fa-bars"></i>
                            </a>
                            <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['maindir']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
" class="navbar-brand">
                                <i class="fab fa-youtube-square logo"></i>
                                <span class="font-weight-bold"><?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['name'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</span>
                                <!-- <img class="img-fluid navbar-img" src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['imgdir']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
/logo.png"> -->
                            </a>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['nav_center']->value == false) {?>
                        <div>
                            <?php if (isset($_SESSION['account'])) {?>
                            <button type="button" class="avatar-btn rounded-circle border border-dark">
                                <img src="https://via.placeholder.com/1200" alt="" class="img-fluid rounded-circle avatar-img" />
                            </button>
                            <?php } else { ?>
                            <button type="button" class="btn border border-primary sign-btn" data-toggle="modal" data-target="#loginModal">
                                <i class="fas fa-user-circle"></i>
                                <span>Sign In</span>
                            </button>
                            <?php }?>
                        </div>
                        <?php }?>
                    </div>
                </nav>
                
                <div class="wrapper">
                    <nav id="sidebar" class="dynamic-padding d-none d-lg-inline-block<?php if ($_smarty_tpl->tpl_vars['display_sidebar']->value) {?> active<?php }?>">
                        <!-- <div class="sidebar-header">
                            <h3>Bootstrap Sidebar</h3>
                            <strong>BS</strong>
                        </div> -->

                        <ul class="list-unstyled components">
                            <li class="active">
                                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <i class="fas fa-home"></i>
                                    Home
                                </a>
                                <ul class="collapse list-unstyled" id="homeSubmenu">
                                    <li>
                                        <a href="#">Home 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 3</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-briefcase"></i>
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <i class="fas fa-copy"></i>
                                    Pages
                                </a>
                                <ul class="collapse list-unstyled" id="pageSubmenu">
                                    <li>
                                        <a href="#">Page 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Page 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Page 3</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-image"></i>
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-question"></i>
                                    FAQ
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-paper-plane"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                        
                        <ul class="list-unstyled components hidden">
                            <li>
                                <a href="#">
                                    <i class="fas fa-paper-plane"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>

                        <!-- <ul class="list-unstyled CTAs">
                            <li>
                                <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                            </li>
                            <li>
                                <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                            </li>
                        </ul> -->
                    </nav>
                <div class="container dynamic-padding" id="content">
                    <?php if ($_smarty_tpl->tpl_vars['display_sidebar']->value) {?><div class="overlay"></div><?php }
}
}
