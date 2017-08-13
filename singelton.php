<?php

class singelton {

    private function __construct() {
        
    }

    public static function getInstance() {
        static $conn = null;
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'car_rental';
        if ($conn == null) {
            $conn = new mysqli($servername, $username, $password, $db);
        }
        return $conn;
    }

}

?>
