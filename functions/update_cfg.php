<?php
    function updateConfig($configtoedit, $configvalue)
    {
        if(empty($configtoedit))
            return 0;

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
?>