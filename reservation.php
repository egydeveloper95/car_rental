<?php

include_once'Database.php';

class reservation {

    private $id;
    private $DB;

    public function __construct() {
        $this->DB = new Database();
    }

    public function GetReservationStatus($id) {
        return ($this->DB->get('reservation_status', array('id' => $id))[0]['status']);
    }

    public function GetPaymentMethod($id) {
        return ($this->DB->get('payment', array('id' => $id))[0]['type']);
    }

    public function GetPaymentMethods() {
        return $this->DB->get('payment', null);
    }

}

?>