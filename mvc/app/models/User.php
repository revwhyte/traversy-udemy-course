<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // register user
        public function register(UserForm $data) {
            $this->db->query('INSERT INTO user(name, email, password) VALUES (:name, :email, :password)');
            
            // bind value
            $this->db->bind(':name', $data->get_name());
            $this->db->bind(':email', $data->get_email());
            $this->db->bind(':password', $data->get_password());

            // execute
            return $this->db->execute() ? true : false;

        }

        public function find_user_by_email(string $email) {
            $this->db->query('SELECT * FROM user WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $this->db->rowCount() > 0;
        }

        public function get_user_by_id(int $id) {
            $this->db->query('SELECT * FROM user WHERE id = :id');

            $this->db->bind(':id', $id);

            return $this->db->single();
        }

        public function login(string $email, string $password) {
            $this->db->query('SELECT * FROM user WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)) {
                // match
                return $row;
            } else {
                return false;
            }
        }
    }