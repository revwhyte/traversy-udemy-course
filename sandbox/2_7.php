<?php
    class User {
        public $name;
        public $age;

        public static $minPassLength = 6;

        public function __construct()  {

        }

        public static function validatePass($pass) {
            // accessing class static attribute
            return strlen($pass) >= self::$minPassLength;
        }
    }

    $password = 'hello1';

    if(User::validatePass($password)) {
        echo 'Password valid';
    } else {
        echo 'Password not valid';
    }