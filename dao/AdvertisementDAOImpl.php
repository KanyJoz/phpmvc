<?php
    require_once('AdvertisementDAO.php');
    require_once('../database/DBConnection.php');
    require_once('../models/Advertisement.php');

    // DAO objects that interacts with the database throug the PDO connection
    class AdvertisementDAOImpl implements AdvertisementDAO {
        // query constants
        private $GET_ALL_ADS_WITH_USERS = 'SELECT * FROM advertisements';
        
        // singleton field
        private static $instance = null;
        
        // private constructor
        private function __construct() {
        }

        // get the list of Users
        public function list_all_ads_with_users() {
            // execute the query
            $conn = ConnectionDB::get_instance();
            $stmt = $conn->get_connection()->prepare($this->GET_ALL_ADS_WITH_USERS);
            $stmt->execute();

            // get all rows from the user table
            $results = $stmt->fetchAll();
            $stmt->closeCursor();

            // make an empty array for the users
            $all_ads = array();

            // fill in the models with data from the database
            foreach($results as $ad_row) {
                $ad = new Advertisement();
                $ad->set_id($ad_row['id']);
                $ad->set_userid($ad_row['userid']);
                $ad->set_title($ad_row['title']);

                $all_ads[] = $ad;
            }

            // return the data
            return $all_ads;
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