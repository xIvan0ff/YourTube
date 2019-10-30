<?php
    require_once('config/config.php');
    session_start();
    $template_dir = $smarty->getTemplateDir();
    $template_dir = $template_dir[0];
    $page = 'index.php';
    if ( $config['installed'] ) {
      //todo page select
      if(isset($_GET['p']) && !empty($_GET['p']))
      {
        $page = 'pages/'.$_GET['p'].'.php';
        $smarty->assign('page', $_GET['p']);
        if(!file_exists($template_dir.'/'.$page))
        {
          $page = '404.php';
        }
      } else {
        $page = 'index.php';
      }
  } else {
    if(!isset($_GET['p']) || $_GET['p'] != 'install') {
      $installdir = $config['maindir']."/install";
      header("Location: ".$installdir);
    }
  }

  $smarty->assign("display_sidebar", $page != "index.php");

  if(isset($_SESSION['account']))
    $smarty->assign('account', unserialize($_SESSION['account']));

  $smarty->display('head.php');
  $smarty->display('nav.php');

  //CUSTOM PAGE

  $smarty->display($page);

  $smarty->display('footer.php'); 
  
?>