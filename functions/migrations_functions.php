<?php
    require_once("../config/config.php");

    if(!isset($_POST))
        return;
        
    if($config['installed'])
    {
        if(!isset($_SESSION['account']))
            return 0;

        $user = unserialize($_SESSION['account']);
        
        if (!($user->isAdmin()))
            return 0;
    }
    require_once('Migrations.php');

    $migrations = new Migrations();

    if(isset($_POST['run'])){
        $migrations->checkMigrations();
    } elseif(isset($_POST['count']))
    {
        $migrations->getMigrationsCount();
    }
?>