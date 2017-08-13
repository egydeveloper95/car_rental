<?php

include_once ('singelton.php');

class Database {

    private $connection;

    public function __construct() {
        $this->connection = singelton::getInstance();
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function Insert($table, $array) {
        $sql = "INSERT INTO $table ";
        $keys = "";
        $values = "";
        foreach ($array as $key => $value) {
            $keys .= $key . ",";
            $values .= "'$value' ,";
        }
        $keys = substr_replace($keys, "", -1);
        $values = substr_replace($values, "", -1);
        $sql .= "($keys) Values ($values)";
        $this->connection->query($sql);
        return true;
    }

    public function Update($table, $array, $username) {
        $sql = "Update $table set ";
        foreach ($array as $key => $value) {
            $sql .= "$key = '$value' ,";
        }

        $sql = substr_replace($sql, "", -1);
        $sql .= "Where username = '$username'";

        $this->connection->query($sql);
        return true;
    }

    public function Delete($table, $array) {
        $sql = " delete From $table Where ";
        foreach ($array as $key => $value) {
            $sql .= "$key = '$value' AND ";
        }
        $sql = trim($sql, "  AND");
        $result = $this->connection->query($sql);
        return true;
    }

    public function get($table, $array) {

        $sql = "SELECT * FROM $table WHERE ";
        if ($array != null) {
            foreach ($array as $key => $value) {
                $sql .= "$key = '$value' AND ";
            }
            $sql = trim($sql, "AND ");
        } else {
            $sql = trim($sql, "WHERE ");
        }
        $data = array();
        if ($result = $this->connection->query($sql)) {
            $row_cnt = $result->num_rows;
            for ($i = 0; $i < $row_cnt; $i++) {
                $row = $result->fetch_assoc();
                $data[$i] = $row;
            }
            $result->close();
        }
        return $data;
    }

    public function Sort($table, $OrderBy, $Condition) {

        $sql = "SELECT * FROM $table  ";
        $sql.="  ORDER BY $OrderBy $Condition";

        $data = array();
        if ($result = $this->connection->query($sql)) {
            $row_cnt = $result->num_rows;
            for ($i = 0; $i < $row_cnt; $i++) {
                $row = $result->fetch_assoc();
                $data[$i] = $row;
            }
            $result->close();
        }
        return $data;
    }

    public function SortByBrand($condition) {

        $sql = "SELECT * FROM car JOIN car_brand on car.brand_id = car_brand.id ORDER BY brand $condition";
        return $this->connection->query($sql);
    }

    public function search($table, $array) {
        $sql = "SELECT * FROM $table WHERE ";
        foreach ($array as $key => $value) {
            $sql .= "$key like '%$value%' AND ";
        }
        $sql = trim($sql, "AND ");
        $data = array();
        if ($result = $this->connection->query($sql)) {
            $row_cnt = $result->num_rows;
            for ($i = 0; $i < $row_cnt; $i++) {
                $row = $result->fetch_assoc();
                $data[$i] = $row;
            }
            $result->close();
        }
        return $data;
    }

    public function UpdateCar($table, $array, $motor_number) {
        $sql = "Update $table set ";
        foreach ($array as $key => $value) {
            $sql .= "$key = '$value' ,";
        }

        $sql = substr_replace($sql, "", -1);
        $sql .= "Where motor_number= '$motor_number'";

        $this->connection->query($sql);
        return true;
    }

    public function UpdateReservationStatus($table, $array, $reservation_id) {
        $sql = "Update $table set ";
        foreach ($array as $key => $value) {
            $sql .= "$key = '$value' ,";
        }

        $sql = substr_replace($sql, "", -1);
        $sql .= "Where id = '$reservation_id'";

        $this->connection->query($sql);
        return true;
    }

    public function is_booked_date($start_date, $end_date, $car_id) {
        $sql = "SELECT * FROM reservation 
        where ((start_date BETWEEN STR_TO_DATE('".$start_date."','%Y-%m-%d') AND STR_TO_DATE('".$end_date."','%Y-%m-%d'))
        OR (end_date  BETWEEN STR_TO_DATE('".$start_date."','%Y-%m-%d') AND STR_TO_DATE('".$end_date."','%Y-%m-%d')) 
        OR(STR_TO_DATE('".$start_date."','%Y-%m-%d') >= start_date AND STR_TO_DATE('".$end_date."','%Y-%m-%d') <= end_date)) AND car_id=".$car_id;
        $result = $this->connection->query($sql);
        $row_cnt = $result->num_rows;
        
        if ($row_cnt > 0) {
            return true;
        } else {
            return FALSE;
        }
    }

}
