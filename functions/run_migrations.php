<?php
    if(isset($_POST)){
        require_once('Migrations.php');
        $migrations = new Migrations();
        $migrations->checkMigrations();
    }
?>