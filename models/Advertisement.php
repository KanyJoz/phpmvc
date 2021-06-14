<?php
    // User object model
    class Advertisement {
        // data of the user
        private $id;
        private $userid;
        private $title;

        // public default constructor
        public function __construct() { }

        // public getters and setters to every data field
        public function get_id() { return $this->id; }
        public function set_id($new_id) { $this->id = $new_id; }

        public function get_userid() { return $this->userid; }
        public function set_userid($new_userid) { $this->userid = $new_userid; }

        public function get_title() { return $this->title; }
        public function set_title($new_title) { $this->title = $new_title; }
    }
?>