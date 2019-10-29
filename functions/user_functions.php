<?php
    if(empty($_POST))
        header('Location: ../');
    

    session_start();
    require_once('User.php');

    $action = 0;

    if(isset($_POST['login']))
        $action = 0;
    if(isset($_POST['register']))
        $action = 1;

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

            $_SESSION['account'] = $user;
            die('1');

            break;
        case 1:

        default:
            break;
    }
    
    die('1');
?>