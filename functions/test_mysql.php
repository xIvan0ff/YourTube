<?php
    if (!(isset($_POST['mysqlhost']) && isset($_POST['mysqluser']) && isset($_POST['mysqlpass']) && isset($_POST['mysqlname']) && !empty($_POST['mysqlhost']) && !empty($_POST['mysqluser']) && !empty($_POST['mysqlpass']) && !empty($_POST['mysqlname'])))
    {
        die("0");
    }
    $port = 3306;
    if(isset($_POST['mysqlport']) && is_numeric($_POST['mysqlport']))
        $port = $_POST['mysqlport'];
    $conn = new mysqli($_POST['mysqlhost'], $_POST['mysqluser'], $_POST['mysqlpass'], '', $port);
        if($conn->connect_error) {
            die("1");
        } else {
            $dbname = $_POST['mysqlname'];
            $sql = 'SELECT COUNT(*) AS `exists` FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMATA.SCHEMA_NAME="'.$dbname.'";';

            // execute the statement
            $query = $conn->query($sql);
            if ($query === false) {
                throw new Exception($conn->error, $conn->errno);
            }

            // extract the value
            $row = $query->fetch_object();
            $dbExists = (bool) $row->exists;
            if(!$dbExists)
            {
                $createQuery = "CREATE DATABASE $dbname";
                $conn->query($createQuery);
                die("3");
            }
        }

    die("2");
?>