<?php
    // include('../config/config.php');
    // include('Validator.php');
    class User {
        public $id;
        public $username;
        public $email;
        public $password;
        public $rank;
        public $avatar;
        public $ip;
        public $regip;

        function __construct($username, $password, $email = NULL)
        {
            if(filter_var($username, FILTER_VALIDATE_EMAIL))
            {
                $this->email = $username;
            } else {
                $this->username = $username;
            }

            $this->password = hash('sha256', $password);
            
            if($email)
                $this->email = $email;
            
            $this->fillData();
        }

        function validate()
        {
            $data = ['password' => $this->password];
            $rules = ['password' => ['required', 'minLen' => 8]];

            if($this->username)
            {
                $rules['username'] = ['required', 'minLen' => 4, 'maxLen' => 20];
                $data['username'] = $this->username;
            }

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
            $errors = $this->validate();
            if(empty($errors))
                return true;

            $this->errors = $errors;

            return false;
        }

        function isAdmin()
        {
            return $this->rank > 2 ? true : false;
        }

        function getErrors()
        {
            if($this->isValid())
                return false;

            $errors = $this->errors;

            return $errors;
        }

        function updateData($searchColumn = 'id', $searchValue = '')
        {
            global $config;

            if(empty($searchValue))
                $searchValue = $this->id;

            $sql = "SELECT * FROM `accounts` WHERE $searchColumn = '$searchValue';";

            $query = $config['mysqlconn']->query($sql);

            if ($query === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }

            $row = $query->fetch_object();
            if($row)
            {
                $this->id = $row->id;
                $this->username = $row->username;
                $this->email = $row->email;
                $this->rank = $row->rank;
                $this->avatar = $config['avatardir']."/$row->avatar";
                $this->regip = $row->regip;
                return true;
            }

            return false;
        }

        function fillData()
        {
            global $config;

            $this->ip = $this->getIP();

            if(!$this->isValid() || !$this->exists())
                return false;
            
            $seachByUsername = true;
            if($this->email)
                $seachByUsername = false;

            $searchColumn = $seachByUsername ? 'username' : 'email';
            $searchValue = $seachByUsername ? $this->username : $this->email;

            return $this->updateData($searchColumn, $searchValue);
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

        function getRank($text = false)
        {
            static $ranks = [
            0 => 'Member', 
            1 => 'VIP',
            2 => 'Moderator',
            3 => 'Administrator'
            ];
            return $text ? $ranks[$this->rank] : $this->rank;
        }

        function logout()
        {
            unset($_SESSION['account']);
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
                    break;
                case 4:
                    $logText = "Account ($this->username) logged out (IP: $this->ip).";
                    break;
                case 5:
                    $logText = "Account ($this->username) changed his profile picture to ($this->avatar) (IP: $this->ip).";
                    break;
                default:
                    break;
            }
            $currentTime = time();
            $query = "INSERT INTO `site_logs` VALUES (NULL, '$logType', '$logText', '$currentTime');";
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
                $_SESSION['account'] = serialize($this);
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

        function updateDefaultAvatar($defaultavatar)
        {
            global $config;

            $avatar = "default/$defaultavatar";

            $sql = "UPDATE `accounts` SET avatar = '$avatar' WHERE id = '$this->id';";

            $query = $config['mysqlconn']->query($sql);

            if ($query === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }

            $this->avatar = $avatar;
            $this->addLog(5);
            return true;
        }
    }

?>