<?php
    require_once('AdvertisementDAO.php');
    require_once('../database/DBConnection.php');
    require_once('../models/Advertisement.php');

    // DAO objects that interacts with the database throug the PDO connection
    class AdvertisementDAOImpl implements AdvertisementDAO {
        // query constants
        private $GET_ALL_ADS_WITH_USERS = 'SELECT * FROM advertisements'; // INNNNNEEN FOLYTAAAATOM
        
        // singleton field
        private static $instance = null;
        
        // private constructor
        private function __construct() {
        }

        // get the list of Users
        public function list_all_ads_with_users() {
            // execute the query
            $conn = ConnectionDB::get_instance();
            $stmt = $conn->get_connection()->prepare($this->GET_ALL_USER);
            $stmt->execute();

            // get all rows from the user table
            $results = $stmt->fetchAll();
            $stmt->closeCursor();

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
        public static function get_instance()
        {
            if (null === static::$instance) {
                static::$instance = new static();
            }
            return static::$instance;
        }
    }
?>