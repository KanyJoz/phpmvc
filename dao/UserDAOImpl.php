<?php
    include('./UserDAO.php');
    include('../database/DBConnection.php');
    include('../models/User.php');

    // DAO objects that interacts with the database throug the PDO connection
    class UserDAOImpl implements UserDAO {
        // query constants
        private $GET_ALL_USER = 'SELECT * FROM users';
        
        // singleton field and the connection
        private static $instance = null;
        private $conn = ConnectionDB::get_instance()->get_connection();

        // private constructor
        private function __construct() {
        }

        // get the list of Users
        public function list_all_users() {
            // execute the query
            $stmt = $this->conn->prepare($this->GET_ALL_USER);
            $stmt->execute();

            // get all rows from the user table
            $results = $stmt->fetchAll();

            // make an empty array for the users
            $all_users = array();

            // fill in the models with data from the database
            foreach($results as $user_row) {
                $user = new User();
                $user->set_id($user_row['id']);
                $user->set_name($user_row['name']);

                $all_users[] = $user;
            }

            // return the data
            return $all_users;
        }

        // get the only instance
        public static function get_instance() {
            if(!self::$instance)
            {
                self::$instance = new ConnectionDB();
            }
            
            return self::$instance;
            }
    }
?>