<?php
    if(empty($_POST))
        header('Location: ../');
    

    require_once('../config/config.php');

    $action = 0;

    if(isset($_POST['login']))
        $action = 0;
    if(isset($_POST['register']))
        $action = 1;
    if(isset($_POST['logout']))
        $action = 2;

    switch($action)
    {
        case 0:
            $user = new User($_POST['login_user'], $_POST['login_password']);
            $errors = $user->getErrors();
            if($errors)
                die($errors);

            if(!$user->login())
            {
                die('0');
            }
            die('1');

            break;
        case 1:
            $user = new User($_POST['register_user'], $_POST['register_password'], $_POST['register_email']);
            break;
        case 2:
            $user = unserialize($_SESSION['account']);
            $user->logout();
            break;
        default:
            break;
    }
    die('1');
?>