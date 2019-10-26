<?php
    include('../config/config.php');
    include('Validator.php');

    class User {
        public $id;
        public $username;
        public $email;
        public $password;

        function __construct($username, $password, $email = NULL)
        {
            $this->username = $username;
            $this->password = hash('sha256', $password);
            
            if($email)
                $this->email = $email;
        }

        function validate($username, $password)
        {
            $data = ['username' => $username, 'password' => $password];
            $rules = [
                // 'id'       => ['required', 'numeric'],
                'username' => ['required', 'minLen' => 4, 'maxLen' => 20, 'alpha'],
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

            return false;
        }

        function getErrors()
        {
            if($this->isValid())
                return false;

            $errors = $this->validate($this->username, $this->password);

            return $errors;
        }

        function login()
        {
            global $config;

            if(!$this->isValid() || !$this->exists())
                return false;

            $sql = "SELECT * FROM `accounts` WHERE username = '$this->username' AND password = '$this->password';";

            $query = $config['mysqlconn']->query($sql);

            if ($query === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }

            $row = $query->fetch_object();
            if($row)
                {
                    $this->id = $row->id;
                    $this->email = $row->email;
                    return true;
                }
                
            return false;
        }

        function create()
        {
            global $config;

            if(!$this->isValid() || $this->exists() || !$this->email)
                return false;

            $sql = "INSERT INTO `accounts` VALUES (NULL, '$this->username', '$this->email', '$this->password')";

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