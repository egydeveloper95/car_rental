<?php

include_once'Database.php';
include_once 'user.php';
include_once 'car.php';

class client extends user {

    private $Firstname;
    private $Lastname;
    private $Email;
    private $Password;
    private $SSN;
    private $DB;

    public function SetFirstName($x) {
        $this->Firstname = $x;
    }

    public function GetFirstName() {
        return $this->Firstname;
    }

    public function SetLastName($y) {
        $this->Lastname = $y;
    }

    public function GetLastName() {
        return $this->Lastname;
    }

    public function SetEmail($z) {
        $this->Email = $z;
    }

    public function GetEmail() {
        return $this->Email;
    }

    public function SetPassword($p) {
        $this->Password = $p;
    }

    public function GetPassword() {
        return $this->Password;
    }

    public function SetSSN($s) {
        $this->SSN = $s;
    }

    public function GetSSN() {
        return $this->SSN;
    }

    public function __construct() {
        $this->DB = new Database();
    }

    public function register() {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['ssn']) && isset($_POST['email'])) {
            $ssn = $_POST['ssn'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_again = $_POST['password_again'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            if (!empty($firstname) && !empty($lastname) && !empty($password) && !empty($password_again) && !empty($username) && !empty($ssn) && !empty($email)) {
                if ($password != $password_again) {
                    echo '<script>alert("Password Doesnot Match")</script>';
                } else {
                    if ($this->DB->get("user", array("username" => $username))) {
                        echo '<script>alert("The username  ' . $username . ' already exists")</script>';
                    } else {

                        if ($this->DB->insert("user", array('firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'password' => $password, 'email' => $email, 'ssn' => $ssn, 'user_type_id' => '2'))) {

                            echo '<script>alert("Registeration Success ")</script>';
                            header("refresh:1;url=index.php");
                        } else {
                            echo '<script>alert("Registeration Failed ")</script>';
                        }
                    }
                }
            } else {
                echo '<script>alert("All Fields Are Required")</script>';
            }
        }
    }

    public function MakeReservation() {
        if (loggedin()) {
            $carid = $_GET['id'];
            $user_id = $_SESSION['user']['id'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $r_s_id = 1;
            $payment_id = $_POST['payment_id'];
            $date_now = date("Y-m-d");

            if ($start_date < $date_now || $end_date < $date_now) {
                echo '<script>alert("Reservation Failed ,Please Choose Valid Dates Instead OF Old Dates")</script>';
            } elseif ($this->DB->is_booked_date($start_date, $end_date, $carid)) {
                echo '<script>alert("Reservation Failed ,The Dates Are Not Available")</script>';
            } else if ($start_date > $end_date) {
                echo '<script>alert("Reservation Failed ,Please Choose Valid Dates")</script>';
            } else {
                $result = $this->DB->Insert('reservation', array('car_id' => $carid, 'user_id' => $user_id, 'start_date' => $start_date, 'end_date' => $end_date, 'r_s_id' => $r_s_id, 'payment_id' => $payment_id));
                if ($result) {
                    $reservation = $this->DB->get('reservation', array('user_id' => $user_id, 'car_id' => $carid, 'start_date' => $start_date, 'end_date' => $end_date, 'r_s_id' => $r_s_id, 'payment_id' => $payment_id));
                    $reservation_id = $reservation[0]['id'];
                    $history = $this->DB->Insert('history', array('user_id' => $user_id, 'reservation_id' => $reservation_id));
                    echo '<script>alert("Reservation Successfull , Your Reservation Number Is ' . $reservation_id . '")</script>';
                }
            }
        } else {
            echo '<script>alert("You Must Login First")</script>';
        }
    }

    public function CancelReservation() {
        if (loggedin()) {
            $user_id = $_SESSION['user']['id'];
            $reservation_id = $_POST['reservation_id'];
            $result = $this->DB->get('reservation', array('user_id' => $user_id, 'id' => $reservation_id));
            if ($result) {
                //   foreach ($result as $reservationid) {
                //   $reservationid['id'];
                $this->DB->UpdateReservationStatus('reservation', array('r_s_id' => 2), $reservation_id);
                echo '<script>alert("Reservation Cancelled")</script>';
            } else {
                echo '<script>alert("Reservation Number is Incorrect")</script>';
            }
        } else {
            echo '<script>alert("You Must Login First")</script>';
        }
    }

    public function UpdateReservation() {
        if (loggedin()) {
            $user_id = $_SESSION['user']['id'];
            $reservation_id = $_POST['reservation_id'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $date_now = date("Y-m-d");
            $result = $this->DB->get('reservation', array('user_id' => $user_id, 'id' => $reservation_id, 'r_s_id' => 1));
            if ($result) {
                $carid = $result[0]['car_id'];
                if ($start_date < $date_now || $end_date < $date_now) {
                    echo '<script>alert("Reservation Failed ,Please Choose Valid Dates Instead OF Old Dates")</script>';
                } elseif ($this->DB->is_booked_date($start_date, $end_date, $carid)) {
                    echo '<script>alert("Reservation Failed ,The Dates Are Not Available")</script>';
                } else if ($start_date > $end_date) {
                    echo '<script>alert("Reservation Failed ,Please Choose Valid Dates")</script>';
                } else {
                    $this->DB->UpdateReservationStatus('reservation', array('start_date' => $start_date, 'end_date' => $end_date), $reservation_id);
                    echo '<script>alert("Reservation Updated")</script>';
                }
            } else {
                echo '<script>alert("Reservation Number is Incorrect")</script>';
            }
        } else {
            echo '<script>alert("You Must Login First")</script>';
        }
    }

}

?>