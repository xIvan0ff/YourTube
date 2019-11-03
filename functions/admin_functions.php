<?php
    if(empty($_POST))
        header('Location: ../');
    
    require_once('../config/config.php');

    $action = 0;

    if(isset($_POST['admin_data']))
        $action = 0;

    switch($action)
    {
        case 0:
            $admin = new Admin();
            $data = $admin->getData();
            die($data);
            break;
        default:
            break;
    }
    die("1");
?>