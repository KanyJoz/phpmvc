<?php 
    require_once('../dao/UserDAOImpl.php');

    // meditates between the view and the model
    class UserController {
        // get the task from the url, based on it perform action and give the data to the view
        private $task;
        private $data = null;

        public function __construct() {
            $this->task = $_GET['task'];

            switch($this->task) {
                case 'list':
                    $this->data = $this->list_task();
                    break;
            }
        }

        private function list_task() {
            return UserDAOImpl::get_instance()->list_all_users();
        }

        public function get_data() { return $this->data; }
    }
?>