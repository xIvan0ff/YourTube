<?php
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
        return $imagesArray;
    }
    function getAdminAvatars()
    {

        $imagesArray = array();

        $directory = "custom/img/avatars/default/admin/";
        if(!file_exists($directory))
            $directory = "../$directory";

        $images = glob($directory . "/*.png");
        foreach($images as $image)
        {
            $imageName = basename($image);
            array_push($imagesArray, $imageName);
        }
        return $imagesArray;
    }
?>