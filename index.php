<?php
    if(!file_exists('config/config.php'))
    {
      header('Location: ./install');
    }

    require_once('config/config.php');
    $template_dir = $smarty->getTemplateDir()[0];

    if(isset($_SESSION['account']))
    {
      $user = unserialize($_SESSION['account']);
      $user->updateData();
      $_SESSION['account'] = serialize($user);
      $smarty->assign('account', $user);
    }

    $page = 'index.php';
    if ( $config['installed'] ) {
      if(isset($_GET['p']) && !empty($_GET['p']))
      {
        $pages = array_filter(explode("/", $_GET['p']));
        switch($pages[0]) {
          case 'profile':
              if(isset($pages[1]))
              {   
                $admin = new Admin();
                $search = $admin->getUser($pages[1]);
                if($search)
                {
                  $smarty->assign('user', $search);
                } else {
                  $smarty->assign('user', '');
                }
              }
            break;
          case 'watch':
          if(isset($pages[1]))
          {
          } else {
            header("Location: ".$config['maindir']);
          }
          break;
        }
        $_GET['p'] = $pages[0];

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

  $smarty->display('head.php');
  $smarty->display('nav.php');

  //CUSTOM PAGE

  $smarty->display($page);

  $smarty->display('footer.php'); 
  
?>