<?php
    class User {
        private $name;
        private $age;

        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }

        // __get MAGIC METHOD
        public function __get($property) {
            if(property_exists($this, $property)) {
                return $this->$property;
            }
        }

        // __set MAGIC METHOD
        public function __set($property, $value) {
            if(property_exists($this, $property)) {
                $this->$property = $value;
            }
            return $this;
        }
    }

    $user1 = new User('John', 40);
    echo $user1->__get('name');
    echo '<br>';
    $user1->__set('age', 41);
    echo $user1->__get('age');