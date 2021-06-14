<?php
    // interface layer, it can be expanded freely
    interface UserDAO {
        function list_all_users();
        function get_user_by_id($id);
    }
?>