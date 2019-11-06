<?php

    require_once('../config/config.php');

    function updateConfig($configtoedit, $configvalue)
    {
        global $config;

        if(empty($configtoedit))
            return 0;

        if($config['installed'])
        {
            if(!isset($_SESSION['account']))
                return 0;

            $user = unserialize($_SESSION['account']);
            
            if (!($user->isAdmin()))
                return 0;
        }

        $configPath = "../config/config.php";
        
        $configName = '$config[\''.$configtoedit.'\'] = ';
        $configUpdate = "\t".$configName."'$configvalue';";
        
        file_put_contents($configPath, implode('', 
        array_map(function($data) use($configName,$configUpdate) {
            return stristr($data,$configName) ? "$configUpdate\n" : $data;
            }, file($configPath))
        ));
        return 1;
    }

    function updateConfigPost($post)
    {
        foreach($post as $key => $value) {
            updateConfig($key, $value);
        }
    }
    
    if(isset($_POST) && !empty($_POST))
    {
        updateConfigPost($_POST);
    }
?>