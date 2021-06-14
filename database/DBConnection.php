<?php
    // Signleton class to get a single database conneciton to MySQL
    class ConnectionDB {
        // singleton field and the connection object
        private static $instance = null;
        private $conn;

        // config data
        private $host;
        private $dbname;
        private $user;
        private $pass;
        private $dsn;

        // Privte constructor for singleton, config data requirement and establish connection
        private function __construct() {
            // get the config data
            $config_info = require_once("../config/dbconfig");
            $this->host = $config_info['dbhost'];
            $this->dbname = $config_info['dbname'];
            $this->user = $config_info['username'];
            $this->pass = $config_info['pwd'];
            $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

            // get the connection object and safe it to the field
            try {
                $this->conn = new PDO($dsn, $this->user, $this->pass);
                $this->conn.setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $err_msg = 'Database Error: ';
                $err_msg .= $e->getMessage();
                echo $err_msg;
                exit();
            }
        }

        // destructor to close the connection after the lifespan of the objects
        public function __desctruct() {
            $this->conn = null;
        }

        // get the only instance
        public static function getInstance() {
          if(!self::$instance)
          {
            self::$instance = new ConnectionDB();
          }
         
          return self::$instance;
        }

        // through the instance get the connection
        public function getConnection() {
          return $this->conn;
        }
    }
?>