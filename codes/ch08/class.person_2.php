<?php
// ?? ??? ???? ??? ????? PHP 5 ?? ????

// class ?? ??????
class Person {
    // ????????? ????????? ??? ?????
    public $name;
    public $weight;
    public $age;
    public $sex;
    public $profession;
private $_lastCalorieConsumed;

// constructor
public function __construct() {
        $this->age = 7;
        $this->weight = 25;
        $this->profession = "Student";
        $this->$_lastCalorieConsumed = 0;
    }

// destructor
    public function __destruct() {
        echo $this->name." is idle now. His current age is ".$this->age." years and now he weighs ".$this->weight." kg.\n";
    }

    // ???? ????????? ??? ?????
    public function eat($food,$calorie) {
  		echo $this->name." is eating “.$food.” with “.$calorie.”  calorie\n";
  		$this->weight += ($calorie/1000);
		$this->_lastCalorieConsumed = $calorie;
}

    public function shop() {
        echo $this->name." is shopping...\n";
    }

    public function cook() {
        echo $this->name." is coooking food...\n";
    }

    public function sleep() {
        echo $this->name." is sleeping...\n";
    }

public function getLastMeal() {
        echo "Calorie consumed in last meal were ".$this->
        _lastCalorieConsumed."\n";
    }

}

?>