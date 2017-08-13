<?php

include_once('Database.php');

class car {

    private $name;
    private $id;
    private $motor_number;
    private $type;
    private $model;
    private $year;
    private $price;
    private $quantity;
    private $DB;

    function __construct() {
        $this->DB = new Database();
    }

    public function SetName($x) {
        $this->name = $x;
    }

    public function GetName() {
        return $this->name;
    }

    public function SetID($x) {
        $this->id = $x;
    }

    public function GetID() {
        return $this->id;
    }

    public function SetMotorNumber($x) {
        $this->motor_number = $x;
    }

    public function GetMotorNumber() {
        return $this->motor_number;
    }

    public function SetType($x) {
        $this->type = $x;
    }

    public function GetType() {
        return $this->type;
    }

    public function SetModel($x) {
        $this->model = $x;
    }

    public function GetModel() {
        return $this->model;
    }

    public function SetYear($x) {
        $this->year = $x;
    }

    public function GetYear() {
        return $this->year;
    }

    public function SetPrice($x) {
        $this->price = $x;
    }

    public function GetPrice() {
        return $this->price;
    }

    public function SetQuantity($x) {
        $this->quantity = $x;
    }

    public function GetQuantity() {
        return $this->quantity;
    }

    public function GetAllCars() {
        return $this->DB->get('car', null);
    }

    public function GetCarByBrand($brand) {
        return $this->DB->get('car', array('brand_id' => $brand));
    }

    public function GetCarByType($type) {
        return $this->DB->get('car', array('type_id' => $type));
    }

    public function GetCarBySearch($search) {
        $modelcars = $this->DB->search('car', array('model' => $search));
        $car = $modelcars;
        $brand = $this->DB->search('car_brand', array('brand' => $search));
        $count = 0;
        $brand_id = array();
        foreach ($brand as $value) {
            $brand_id[$count] = $value['id'];
            $count++;
        }
        foreach ($brand_id as $value) {
            $car = array_merge($this->GetCarByBrand($value), $car);
        }
        $type = $this->DB->search('car_type', array('type' => $search));
        $count = 0;
        $type_id = array();
        foreach ($type as $value) {
            $type_id[$count] = $value['id'];
            $count++;
        }
        foreach ($type_id as $value) {
            $car = array_merge($this->GetCarByType($value), $car);
        }
        return $car;
    }

    public function GetCarDetails($id) {
        return ($this->DB->get('car', array('id' => $id))[0]);
    }

    public function GetCarType($type) {
        return ($this->DB->get('car_type', array('id' => $type))[0]['type']);
    }

    public function GetCarBrand($brand) {
        return ($this->DB->get('car_brand', array('id' => $brand))[0]['brand']);
    }

    public function GetCarColor($color) {
        return ($this->DB->get('car_color', array('id' => $color))[0]['color']);
    }

    public function GetCarYear($year) {
        return ($this->DB->get('car_year', array('id' => $year))[0]['year']);
    }

    public function GetBrands() {
        return $this->DB->get('car_brand', null);
    }

    public function GetTypes() {
        return $this->DB->get('car_type', null);
    }

    public function GetColors() {
        return $this->DB->get('car_color', null);
    }

    public function GetYears() {
        return $this->DB->get('car_year', null);
    }

    public function SearchCar($model) {
        return ($this->DB->get('car', array('model' => $model))[0]);
    }

    public function SortCarByPriceAsc() {
        return $this->DB->Sort('car', 'price', 'Asc');
    }

    public function SortCarByPriceDsc() {
        return $this->DB->Sort('car', 'price', 'DESC');
    }

    public function SortCarByBrandASC() {
        return $this->DB->SortByBrand('asc');
    }

    public function SortCarByBrandDesc() {
        return $this->DB->SortByBrand('Desc');
    }

}

?>