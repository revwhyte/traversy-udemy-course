<?php
    class UserForm {
        private string $name;
        private string $email;
        private string $password;
        private string $confirm_password;
        private string $name_err;
        private string $email_err;
        private string $password_err;
        private string $confirm_password_err;

        public function __construct() {
            $this->name = "";
            $this->email = "";
            $this->password = "";
            $this->confirm_password = "";
            $this->name_err = "";
            $this->email_err = "";
            $this->password_err = "";
            $this->confirm_password_err = "";
        }

        // accessors
        public function get_name() { return $this->name; }
        public function get_email() { return $this->email; }
        public function get_password() { return $this->password; }
        public function get_confirm_password() { return $this->confirm_password; }
        public function get_name_err() { return $this->name_err; }
        public function get_email_err() { return $this->email_err; }
        public function get_password_err() { return $this->password_err; }
        public function get_confirm_password_err() { return $this->confirm_password_err; }
        
        public function set_name($name) { $this->name = $name; }
        public function set_email($email) { $this->email = $email; }
        public function set_password($password) { $this->password = $password; }
        public function set_confirm_password($confirm_password) { $this->confirm_password = $confirm_password; }
        public function set_name_err($name_err) { $this->name_err = $name_err; }
        public function set_email_err($email_err) { $this->email_err = $email_err; }
        public function set_password_err($password_err) { $this->password_err = $password_err; }
        public function set_confirm_password_err($confirm_password_err) { $this->confirm_password_err = $confirm_password_err; }


    }