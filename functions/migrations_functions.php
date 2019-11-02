<?php
    if(!isset($_POST))
        return;

    require_once('Migrations.php');

    $migrations = new Migrations();

    if(isset($_POST['run'])){
        $migrations->checkMigrations();
    } elseif(isset($_POST['count']))
    {
        $migrations->getMigrationsCount();
    }
?>