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

    function getLogs($order = 'ASC')
    {
        global $config;

        $sql = "SELECT * FROM `site_logs` ORDER BY id $order;";

        $query = $config['mysqlconn']->query($sql);
        
        if($query === false) {
            throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
        }

        while($row = $query->fetch_array())
            $rows[] = $row;

        if(isset($rows))
            return $rows;
        return false;
    }

    function getUser($idOrUsername)
    {
        global $config;

        $sql = "SELECT * FROM `accounts` WHERE username = '$idOrUsername' OR id = '$idOrUsername';";

        $query = $config['mysqlconn']->query($sql);

        if ($query === false) {
            throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
        }

        $row = $query->fetch_object();
        if($row)
        {
            $user = new User($row->username, $row->password);
            return $user;
        }
        
        return false;  
    }

}

?>