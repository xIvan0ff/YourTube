<?php
    if(isset($_POST) && !empty($_POST))
    {
        require_once("../functions/update_cfg.php");
        foreach($_POST as $key => $value) {
            updateConfig($key, $value);
        }
    }

    session_start();

    if(file_exists('../config/config.bac') && !file_exists('../config/config.php'))
    {
        rename('../config/config.bac', '../config/config.php');
        chmod("../config/config.php",01777); 
    }

    require_once('../config/config.php');
  
    if($config['installed'])
    {
        header("Location: ".$config['maindir']);
    }
    
    $smarty->setTemplateDir('../templates')
    ->setCompileDir('../templates_c')
    ->setCacheDir('../cache');

    $template_dir = $smarty->getTemplateDir();
    $template_dir = $template_dir[0];

    $smarty->assign('nav_center', true);
    $smarty->assign('display_sidebar', true);

    $page = "404.php";
    if(isset($_GET['step']) && !empty($_GET['step']))
    {
        if(!isset($_SESSION['step']))
        {    
            $_GET['step'] = 1;
            $_SESSION['step'] = 1;
        } else {
            if($_GET['step'] == $_SESSION['step']+1)
            {
                $_SESSION['step'] = $_GET['step'];
            } else {
                $_GET['step'] = $_SESSION['step'];
            }
        }
        $page = 'install/'.$_GET['step'].'.php';
        if(!file_exists($template_dir.'/'.$page))
        {
        header("Location: ./");
        }
    } else {
        $page = 'install/1.php';
        $_SESSION['step'] = 1;
    }

    $smarty->assign('page', $page);

    $smarty->display('head.php');
    $smarty->display('nav.php');
    $smarty->display("install/index.php");
    
    $smarty->display('footer.php'); 
?>