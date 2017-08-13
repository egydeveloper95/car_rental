<?php

include 'Database.php';

class user {

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

    public function login() {
        if (isset($_POST['Username']) && isset($_POST['Password'])) {
            $username = $_POST['Username'];
            $password = $_POST['Password'];
            if (!empty($username) && !empty($password)) {
                $data = $this->DB->get("user", array("username" => $username, "password" => $password));

                if (!empty($data)) {
                    //    session_start();
                    $_SESSION['user'] = $data[0];
                    $usertype = $data[0]['user_type_id'];
                    $user_id = $data[0]['id'];
                    /*     if ($usertype == 1) {
                      header('Location:AdminPerm.php');
                      } */



                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

    function loggedin() {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    public function GetUserDetails($id) {
        return ($this->DB->get('user', array('id' => $id))[0]);
    }

    public function GetReservationsIDs($user_id) {
        return ($this->DB->get('reservation', array('user_id' => $user_id, 'r_s_id' => 1)));
    }

    public function EditProfile() {
        if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['ssn']) && isset($_POST['password']) && isset($_POST['password_again'])) {
            $username = $_SESSION['user']['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $ssn = $_POST['ssn'];
            $password = $_POST['password'];
            $password_again = $_POST['password_again'];
            $user_type_id = $_SESSION['user']['user_type_id'];
            if ($password != $password_again) {
                echo '<script>alert("Password Doesnot Match")</script>';
            } else {
                $this->DB->Update("user", array('password' => $password, 'firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'ssn' => $ssn, 'user_type_id' => $user_type_id), $username);
                //   echo '<script>alert("Profile Updated Successfully")</script>';
                header('Location:myprofile.php');
            }
        }
    }

    public function SendFeedBack() {

        $subject = $_POST['subject'];
        $description = $_POST['description'];
        $user_id = $_SESSION['user']['id'];
        $this->DB->Insert("feedback", array('user_id' => $user_id, 'Subject' => $subject, 'description' => $description));
        echo '<script>alert("FeedBack Sent Successfully")</script>';
    }

    public function ShowHistory() {
        $user_id = $_SESSION['user']['id'];
        return ($this->DB->get('history', array('user_id' => $user_id)));
    }

    public function GetReservationInfo($id) {
        $user_id = $_SESSION['user']['id'];
        return ($this->DB->get('reservation', array('user_id' => $user_id, 'id' => $id)));
    }

    public function ForgetPassword() {
        if (isset($_POST['username']) && isset($_POST['email'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $result = $this->DB->get('user', array('username' => $username, 'email' => $email));

            if ($result) {
                $password = $result[0]['password'];
                echo '<script>alert("Your Password is ' . $password . '")</script>';
                header("refresh:0;url=index.php");
            } else {
                echo '<script>alert("Invalid Username/Email")</script>';
            }
        }
    }

}

?>