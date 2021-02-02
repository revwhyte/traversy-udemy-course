<?php
    class Users extends Controller{
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register() {
            // check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // process form
                
                // sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // validate name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter e-mail';
                }
                else {
                    // check email
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'E-mail is already taken';
                    }
                }

                // validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
                // For some haunted reason, this isnt working at all! '-'
                // if(strlen($data['password'] <= 6)) {
                //     $data['password_err'] = 'Password must have at least 6 characters';
                // }

                // validate confirm password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // make sure errors are empty
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // register user
                    if($this->userModel->register($data)) {
                        flash('register_success', 'You are registered');
                        redirect('users/login');
                    } else {
                        die('something went wrong');
                    }
                } else {
                    // load view with errors
                    $this->view('users/register', $data);
                }
            } else {
                // init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // load view
                $this->view('users/register', $data);
            }
        }

        public function login() {
            // check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                 // validate email
                 if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter e-mail';
                }

                // validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // check for user/email
                if($this->userModel->findUserByEmail($data['email'])) {
                    // user found
                } else {
                    // user not found
                    $data['email_err']  = 'No user found';
                }

                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // check and set logged user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser) {
                        // create session
                        die('success');
                    } else {
                        $data['password_err'] = 'Password incorrect';

                        $this->view('users/login', $data);
                    }
                    
                } else {
                    $this->view('users/login', $data);
                }

            } else {
                // init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                // load view
                $this->view('users/login', $data);
            }
        }
    }