<?php

class Admin {
    public $usersCount;
    public $logsCount;

    function __construct()
    {
        $this->getUsersCount();
        $this->getLogsCount();
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

    function getLogsCount()
    {
        global $config;
        $checkQuery = "SELECT COUNT(*) AS `count` FROM `site_logs`;";
        $query = $config['mysqlconn']->query($checkQuery);
        if ($query === false) {
            throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
        }

        $row = $query->fetch_object();
        $logsCount = $row->count;
        $this->logsCount = $logsCount;
        return $logsCount;
    }

    function getData()
    {
        return "$this->usersCount|$this->logsCount";
    }
}

?>