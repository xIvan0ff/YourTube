<?php
    // include("../config/config.php");
    function getDefaultAvatars()
    {

        $imagesArray = array();

        $directory = "custom/img/avatars/default/";
        if(!file_exists($directory))
            $directory = "../$directory";

        $images = glob($directory . "/*.png");
        foreach($images as $image)
        {
            $imageName = basename($image);
            array_push($imagesArray, $imageName);
        }
        // print_r($imagesArray);
        return $imagesArray;
    }
    // getDefaultAvatars();
?>