<?php
    $smartyLib = 'libs/Smarty.class.php';
    $globalInc = 'functions/GlobalIncludes.php';
    if(!file_exists($smartyLib))
        $smartyLib = "../$smartyLib";
    require $smartyLib;    
    if(!file_exists($globalInc))
        $globalInc = "../$globalInc";
    require $globalInc;

    $smarty = new Smarty;

    // GENERAL SETTINGS
	$config['name'] = 'YourTube';
	$config['adminpass'] = '123';

    // DATABASE SETTINGS
	$config['mysqlhost'] = 'localhost';
	$config['mysqlport'] = '3306';
	$config['mysqluser'] = 'root';
	$config['mysqlpass'] = 'asd123ASD!';
	$config['mysqlname'] = 'yourtube';
    
    //             -- Don't touch under this line --
    $config['installed'] = '1';
    $config['version'] = '0.3.1';
    $config['nav_center'] = false; // If the navigation should be centered

    //PATHS
    $config['maindir'] = dirname($_SERVER["PHP_SELF"]);
    $config['customdir'] = '/custom';
    $config['imgdir'] = '/img';

    if(!is_dir(dirname(__DIR__,2).$config['maindir'].$config['customdir']))
        $config['maindir'] = dirname($config['maindir'], 1);
    

    $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';

    $config['maindir'] = $protocol.$_SERVER['HTTP_HOST'].$config['maindir'];
    $config['customdir'] = $config['maindir'].$config['customdir'];
    $config['imgdir'] = $config['customdir'].$config['imgdir'];

    $config['default_avatars'] = getDefaultAvatars();

    $smarty->assign('maindir', $config['maindir']);
    $smarty->assign('imgdir', $config['imgdir']);
    $smarty->assign('customdir', $config['customdir']);
    $smarty->assign('nav_center', $config['nav_center']);
    $smarty->assign('config', $config);
    
    if($config['installed'] == '1')
    {
        $config['mysqlconn'] = new mysqli($config['mysqlhost'], $config['mysqluser'], $config['mysqlpass'], $config['mysqlname'], $config['mysqlport']);
        if($config['mysqlconn']->connect_error)
            die("cannot connect");
    }

?>