<?php 
    require_once('../dao/AdvertisementDAOImpl.php');
    require_once('../dao/UserDAOImpl.php');

    // meditates between the view and the model
    class AdvertisementController {
        // get the task from the url, based on it perform action and give the data to the view
        private $task;
        private $data = null;
        private $usernames = null;

        public function __construct() {
            $this->task = $_GET['task'];

            switch($this->task) {
                case 'list':
                    $this->data = $this->list_task();
                    break;
            }
        }

        private function list_task() {
            // get all the ads from the ad DAO
            $results = AdvertisementDAOImpl::get_instance()->list_all_ads_with_users();

            // paralell fill up the usernames with the advertisements, it's also gettin passed to the ad view, sideeffect
            $this->usernames = array();
            foreach($results as $ad) {
                $user = UserDAOImpl::get_instance()->get_user_by_id($ad->get_userid());
                $this->usernames[] = $user->get_name();
            }

            // return the ads array
            return $results;
        }

        public function get_data() { return $this->data; }
        public function get_usernames() { return $this->usernames; }
    }
?>