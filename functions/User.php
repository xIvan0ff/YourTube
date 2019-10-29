<?php
    include('../config/config.php');
    include('Validator.php');

    class User {
        public $id;
        public $username;
        public $email;
        public $password;
        public $ip;
        public $regip;

        function __construct($username, $password, $email = NULL)
        {
            $this->username = $username;
            $this->password = hash('sha256', $password);
            
            if($email)
                $this->email = $email;
            
            $this->fillData();
        }

        function validate($username, $password)
        {
            $data = ['username' => $username, 'password' => $password];
            $rules = [
                // 'id'       => ['required', 'numeric'],
                'username' => ['required', 'minLen' => 4, 'maxLen' => 20],
                'password' => ['required', 'minLen' => 8]
            ];

            if($this->email)
            {
                $rules['email'] = ['required', 'email', 'minLen' => 8,'maxLen' => 50];
                $data['email'] = $this->email;
            }
            
            $v = new Validator();
            $v->validate($data, $rules);
            $fieldErrors = $v->string_errors();
            return $fieldErrors;
        }

        function isValid()
        {
            $errors = $this->validate($this->username, $this->password);
            if(empty($errors))
                return true;

            $this->errors = $errors;

            return false;
        }

        function getErrors()
        {
            if($this->isValid())
                return false;

            $errors = $this->errors;

            return $errors;
        }

        function fillData()
        {
            global $config;

            $this->ip = $this->getIP();
            
            if(!$this->isValid() || !$this->exists())
                return false;
            
            $sql = "SELECT * FROM `accounts` WHERE username = '$this->username';";

            $query = $config['mysqlconn']->query($sql);

            if ($query === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }

            $row = $query->fetch_object();
            if($row)
            {
                $this->id = $row->id;
                $this->email = $row->email;
                $this->regip = $row->regip;
                return true;
            }

            return false;
        }

        function getIP()
        {
            $ip = getenv('HTTP_CLIENT_IP')?:
            getenv('HTTP_X_FORWARDED_FOR')?:
            getenv('HTTP_X_FORWARDED')?:
            getenv('HTTP_FORWARDED_FOR')?:
            getenv('HTTP_FORWARDED')?:
            getenv('REMOTE_ADDR');
            return $ip;
        }

        function addLog($logType)
        {
            global $config;
            
            $logText;
            switch($logType)
            {
                case 1:
                    $logText = "Account (#$this->id) failed a login attempt (IP: $this->ip).";
                    break;
                case 2:
                    $logText = "Account (#$this->id) successfully logged in (IP: $this->ip).";
                    break;
                case 3:
                    $logText = "(IP: $this->ip) tried to login with invalid username ($this->username).";
                default:
                    break;
            }

            $query = "INSERT INTO site_logs VALUES (NULL, '$logType', '$logText');";
            $sql = $config['mysqlconn']->query($query);

            if ($sql === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }
        }

        function login()
        {
            global $config;

            if(!$this->isValid() || !$this->exists())
            {
                $this->addLog(3);
                return false;
            }

            $sql = "SELECT * FROM `accounts` WHERE username = '$this->username' AND password = '$this->password';";

            $query = $config['mysqlconn']->query($sql);

            if ($query === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }

            $row = $query->fetch_object();
            if($row)
            {
                $this->fillData();
                $this->addLog(2);
                return true;
            }
            
            $this->addLog(1);
            return false;
        }

        function create()
        {
            global $config;

            if(!$this->isValid() || $this->exists() || !$this->email)
                return false;


            $sql = "INSERT INTO `accounts` VALUES (NULL, '$this->username', '$this->email', '$this->password', '$this->$ip')";

            $query = $config['mysqlconn']->query($sql);

            if ($query === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }

            return true;
        }

        function exists()
        {
            global $config;

            $checks = array();

            $checks[0] = "SELECT * FROM `accounts` WHERE username = '$this->username';";

            if($this->email)
                $checks[1] = "SELECT * FROM `accounts` WHERE email = '$this->email';";

            foreach($checks as $sql)
            {
                $query = $config['mysqlconn']->query($sql);
               
                if ($query === false) {
                    throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
                }
    
                $row = $query->fetch_object();
                if($row)
                    return true;
            }
              
            return false;
        }
    }

?>