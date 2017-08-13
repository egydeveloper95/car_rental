<?php

include_once('Database.php');
include_once 'user.php';
include_once './car.php ';

class admin extends user {

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

    public function searchuser() {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            if (!empty($username)) {
                $result = $this->DB->search("user", array("username" => $username));
                if (!empty($result)) {
                    foreach ($result as $value) {
                        // echo  $value['id'] . ' ' . $value['firstname'] . ' ' . $value['lastname'] . ' ' . $value['username'] . ' ' . $value['password'] . ' ' . $value['email'].' ' . $value['ssn'] . '<br>';

                        echo 'ID = ' . $value['id'] . '<br>';
                        echo 'Firstname = ' . $value['firstname'] . '<br>';
                        echo 'Lastname = ' . $value['lastname'] . '<br>';
                        echo 'SSN = ' . $value['ssn'] . '<br>';
                        echo 'Email = ' . $value['email'] . '<br>';
                        echo 'Username = ' . $value['username'] . '<br>';
                        echo 'Password = ' . $value['password'] . '<br>';
                        echo 'Usertype_ID = ' . $value['user_type_id'] . '<br><br><br>';
                    }
                } else {
                    echo '<script>alert("User Not Found")</script>';
                    ;
                }
            } else {
                echo '<script>alert("Please Enter Username")</script>';
                ;
            }
        }
    }

    public function deleteuser() {

        $username = $_POST['username'];
        if (!empty($username)) {
            $result = $this->DB->get("user", array("username" => $username));
            if (!empty($result)) {
                $total = $this->DB->Delete("user", array("username" => $username));
                echo '<script>alert("User Deleted Successfully")</script>';
            } else {
                echo '<script>alert("Username Not Found")</script>';
                ;
            }
        } else {
            echo '<script>alert("Please Enter Username")</script>';
            ;
        }
    }

    public function adduser() {

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['ssn']) && isset($_POST['email']) && isset($_POST['user_type_id'])) {
            $ssn = $_POST['ssn'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_again = $_POST['password_again'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $user_type_id = $_POST['user_type_id'];

            if (!empty($firstname) && !empty($lastname) && !empty($password) && !empty($password_again) && !empty($username) && !empty($ssn) && !empty($email) && !empty($user_type_id)) {
                if ($password != $password_again) {
                    echo '<script>alert("Password Doesnot Match !")</script>';
                    ;
                } else {
                    if ($this->DB->get("user", array("username" => $username))) {

                        echo '<script>alert("The Username ' . $username . ' Already Exists")</script>';
                    } else {

                        if ($this->DB->insert('user', array('firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'password' => $password, 'email' => $email, 'ssn' => $ssn, 'user_type_id' => $user_type_id))) {
                            echo '<script>alert("User Added Successfully")</script>';
                        } else {
                            echo '<script>alert("Add Failed")</script>';
                            ;
                        }
                    }
                }
            } else {
                echo '<script>alert("All Fields Are Required")</script>';
                ;
            }
        }
    }

    public function updateuser() {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['ssn']) && isset($_POST['email']) && isset($_POST['user_type_id'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $ssn = $_POST['ssn'];
            $user_type_id = $_POST['user_type_id'];
            if (!empty($username)) {
                $result = $this->DB->get("user", array('username' => $username));
                if (!empty($result)) {
                    $total = $this->DB->Update("user", array('password' => $password, 'firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'ssn' => $ssn, 'user_type_id' => $user_type_id), $username);
                    echo '<script>alert("User Added Successfully")</script>';
                } else {
                    echo'<script>alert("User Not Found")</script>';
                }
            } else {
                echo'<script>alert("Please Enter Username ")</script>';
            }
        }
    }

    private function uploadimage($string) {
        $car = new car();
        $target_dir = "img/" . $car->GetCarBrand($_POST['brand_id']) . "/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir);
        }
        $target_file = $target_dir . basename($_FILES[$string]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

        $check = getimagesize($_FILES[$string]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script>alert("File is not an image")</script>';

            $uploadOk = 0;
        }

// Check if file already exists
        /* if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
          } */
// Check file size
        if ($_FILES[$string]["size"] > 50000000) {
            echo '<script>alert("Sorry, Your File is Too Large")</script>';

            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';

            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo '<script>alert("Sorry,Your File Wasnot Uploaded")</script>';

// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$string]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
            }
        }
    }

    public function addcar() {

        if (isset($_POST['model']) && isset($_POST['color_id']) && isset($_POST['brand_id']) && isset($_POST['type_id']) && isset($_POST['motor_number']) && isset($_POST['year_id']) && isset($_POST['price'])) {
            $color_id = $_POST['color_id'];
            $brand_id = $_POST['brand_id'];
            $model = $_POST['model'];
            $type_id = $_POST['type_id'];
            $motor_number = $_POST['motor_number'];
            $year_id = $_POST['year_id'];
            $price = $_POST['price'];
            $image = $this->uploadimage('Image');



            if (!empty($image) && !empty($model) && !empty($type_id) && !empty($motor_number) && !empty($year_id) && !empty($price) && !empty($color_id) && !empty($brand_id)) {

                if ($this->DB->get("car", array("motor_number" => $motor_number))) {
                    echo '<script>alert("The MotorNumber  ' . $motor_number . ' already exists")</script>';
                } else if ($this->DB->insert("car", array('model' => $model, 'motor_number' => $motor_number, 'year_id' => $year_id, 'type_id' => $type_id, 'price' => $price, 'color_id' => $color_id, 'brand_id' => $brand_id, 'image' => $image))) {
                    echo '<script>alert("Car Added Successfully")</script>';
                } else {
                    echo '<script>alert("Add Failed")</script>';
                }
            } else {
                echo '<script>alert("All Fields Are Required")</script>';
            }
        }
    }

    public function deletecar() {

        $Motor_Number = $_POST['motor_number'];
        if (!empty($Motor_Number)) {
            $result = $this->DB->get("car", array("motor_number" => $Motor_Number));
            if (!empty($result)) {
                $total = $this->DB->Delete("car", array("motor_number" => $Motor_Number));
                echo '<script>alert("Car Deleted")</script>';
            } else {
                echo '<script>alert("Car Not Found")</script>';
            }
        } else {
            echo '<script>alert("Please Enter Motor Number")</script>';
        }
    }

    public function searchcar() {

        $motornumber = $_POST['motor_number'];
        if (!empty($motornumber)) {
            $result = $this->DB->get("car", array("motor_number" => $motornumber));
            if (!empty($result)) {
                foreach ($result as $value) {

                    echo 'ID = ' . $value['id'] . '<br>';
                    echo 'Model = ' . $value['model'] . '<br>';
                    echo 'Motor-Number = ' . $value['motor_number'] . '<br>';
                    echo 'Year = ' . $value['year_id'] . '<br>';
                    echo 'Type-ID = ' . $value['type_id'] . '<br>';
                    echo 'Price = ' . $value['price'] . '<br>';
                    echo 'Brand-ID = ' . $value['brand_id'] . '<br>';
                    echo 'Color-ID = ' . $value['color_id'] . '<br>';
                }
            } else {
                echo '<script>alert("Car Not Found)</script>';
            }
        } else {
            echo '<script>alert("Please Enter Motor Number")</script>';
        }
    }

    public function updatecar() {

        $model = $_POST['model'];
        $type_id = $_POST['type_id'];
        $motor_number = $_POST['motor_number'];
        $year_id = $_POST['year_id'];
        $price = $_POST['price'];
        $brand_id = $_POST['brand_id'];
        $color_id = $_POST['color_id'];
        $image = $this->uploadimage('Image');

        if (!empty($motor_number)) {
            $result = $this->DB->get("car", array('motor_number' => $motor_number));
            if (!empty($result)) {
                $total = $this->DB->UpdateCar("car", array('model' => $model, 'type_id' => $type_id, 'motor_number' => $motor_number, 'year_id' => $year_id, 'price' => $price, 'color_id' => $color_id, 'brand_id' => $brand_id, 'image' => $image), $motor_number);
                echo '<script>alert("Car Updated")</script>';
            } else {
                echo '<script>alert("Car Not Found")</script>';
            }
        } else {
            echo '<script>alert("Please Enter Motor Number")</script>';
        }
    }

    public function GetUserType() {
        return $this->DB->get('user_type', null);
    }

    public function ListUsers() {
        return $this->DB->get('user', null);
    }

    public function GetUserTypeById($id) {
        return $this->DB->get('user_type', array('id' => $id));
    }

    public function ViewFeedBacks() {
        return $this->DB->get('feedback', null);
    }

}

?>