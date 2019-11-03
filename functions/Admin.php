<?php

class Admin {
    public $usersCount;

    function __construct()
    {
        $this->getUsersCount();
    }

    function getUsersCount()
    {
        global $config;
        $checkQuery = "SELECT COUNT(*) AS `count` FROM `accounts`;";
        $query = $config['mysqlconn']->query($checkQuery);
        if ($query === false) {
            throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
        }

        $row = $query->fetch_object();
        $usersCount = $row->count;
        $this->usersCount = $usersCount;
        return $usersCount;
    }
}

?>