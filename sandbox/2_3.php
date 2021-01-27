<?php
    // define a class
    class User {
        // properties
        public $name;
        

        // methods
        public function sayHello() {
            return $this->name . " says hello";
        }

        
    }

    // instantiate a user obj from user class
    $user1 = new User();
    $user1->name = 'Brad';
    echo $user1->name;
    echo '<br>';
    echo $user1->sayHello();

    echo '<br>';

    // create new user
    $user2 = new User();
    $user2->name = 'Jeff';
    echo $user2->name;
    echo '<br>';
    echo $user2->sayHello();