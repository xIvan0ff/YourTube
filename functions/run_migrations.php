<?php
    if(!empty($_POST)){
        require_once('migrations.php');
        checkMigrations();
    }
?>