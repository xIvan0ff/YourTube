<?php
    if(empty($_POST))
        die('0');

    require_once('../config/config.php');

    $action = 0;

    if(isset($_POST['login']))
        $action = 0;
    if(isset($_POST['register']))
        $action = 1;
    if(isset($_POST['logout']))
        $action = 2;
    if(isset($_POST['defaultavatar']))
        $action = 3;
    if(isset($_POST['customavatar']))
        $action = 4;

    switch($action)
    {
        case 0:
            $user = new User($_POST['login_user'], $_POST['login_password']);
            $errors = $user->getErrors();
            if($errors)
                die($errors);

            if(!$user->login())
                die('0');

            break;
        case 1:
            $user = new User($_POST['register_user'], $_POST['register_password'], $_POST['register_email']);
            $errors = $user->getErrors();
            if($errors)
                die($errors);

            if(!$user->create())
                die('0');
                
            break;
        case 2:
            $user = unserialize($_SESSION['account']);
            $user->logout();
            break;
        case 3:
            $user = unserialize($_SESSION['account']);
            $user->updateDefaultAvatar($_POST['defaultavatar']);
            break;
        case 4:
            $user = unserialize($_SESSION['account']);
            die($user->updateCustomAvatar($_FILES['avatar-file']));
            break;
        default:
            break;
    }
    die('1');
?>