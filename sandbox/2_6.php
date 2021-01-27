<?php
    class User {
        protected $name;
        protected $age;

        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }
    }

    class Customer extends User {
        private $balance;

        public function __construct($name, $age, $balance) {
            // = super in java
            parent::__construct($name, $age);
            $this->balance = $balance;
        }

        public function pay($amount) {
            return $this->name . " paid $$amount";
        }

        public function getBalance() {
            return $this->balance;
        }
    }

    $c1 = new Customer('John', 33, 500);
    //echo $c1->pay(100);
    echo $c1->getBalance();