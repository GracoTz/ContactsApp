<?php
    class Database {
        private $host;
        private $dbname;
        private $user;
        private $password;
        private $charset;
        
        public function __construct() {
            $this->host = constant('HOST');
            $this->dbname = constant('DBNAME');
            $this->user = constant('USERNAME');
            $this->password = constant('PASSWORD');
            $this->charset = constant('CHARSET');
        }

        public function connect() {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            return new PDO($dsn, $this->user, $this->password, $options);
        }
    }
?>