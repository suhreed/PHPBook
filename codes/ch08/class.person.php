<?php
namespace MyBookExamples;

// class Person
class Person {
    
    //properties
    public $name;
    public $weight;
    public $age;
    public $sex;
    public $profession;

    //methods
    public function eat() {
        echo $this->name." is eating...\n";
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
}

?>