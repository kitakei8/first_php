<?php

class User {
  public $name;

  public function __construct($name) {
    $this->name = $name;
  }

  public function sayHi() {
    echo "hi, i am $this->name!";
  }

}

$tom = new User("Tom");
$bob = new User("Bob");

$tom->sayHi();
echo $bob->name;
