<?php
    // User object model
    class User {
        // data of the user
        private $id;
        private $name;

        // public default constructor
        public function __construct() { }

        // public getters and setters to every data field
        public function get_id() { return $this->id; }
        public function set_id($new_id) { $this->id = $new_id; }

        public function get_name() { return $this->name; }
        public function set_name($new_name) { $this->name = $new_name; }
    }
?>