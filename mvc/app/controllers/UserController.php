<?php
    class UserController extends Controller {
        public function __construct() {
            $this->userModel = $this->model('User');
            $this->userForm = $this->form('UserForm');
        }

        public function register() {
            // check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init userForm
                foreach ($_POST as $campo => $valor) {
                    $this->userForm->{"set_{$campo}"}(filter_var($valor, FILTER_SANITIZE_STRING));
                }

                // validate name
                if(empty($this->userForm->get_name())) {
                    $this->userForm->set_name_err('Please enter name');
                }

                // validate email
                if(empty($this->userForm->get_email())) {
                    $this->userForm->set_email_err('Please enter e-mail');
                }
                else {
                    // check email
                    if($this->userModel->find_user_by_email($this->userForm->get_email())) {
                        $this->userForm->set_email_err('E-mail is already taken');
                    }
                }

                // validate password
                if(empty($this->userForm->get_password())) {
                    $this->userForm->set_password_err('Please enter password');
                }
                $tam = strlen($this->userForm->get_password());
                if($tam < 6) {
                    $this->userForm->set_password_err('Password must have at least 6 characters');
                }

                // validate confirm password
                if(empty($this->userForm->get_confirm_password())) {
                    $this->userForm->set_confirm_password_err('Please confirm password');
                } else {
                    if($this->userForm->get_password() != $this->userForm->get_confirm_password()) {
                        $this->userForm->set_confirm_password_err('Passwords do not match');
                    }
                }

                // make sure errors are empty
                if(empty($this->userForm->get_name_err()) &&
                    empty($this->userForm->get_email_err()) &&
                     empty($this->userForm->get_password_err()) &&
                     empty($this->userForm->get_confirm_password_err())) {
                    // hash password
                    $this->userForm->set_password(password_hash($this->userForm->get_password(), PASSWORD_DEFAULT));

                    // register user
                    if($this->userModel->register($this->userForm)) {
                        flash('register_success', 'You are registered');
                        redirect('user/login');
                    } else {
                        die('something went wrong');
                    }
                } else {
                    // load view with errors
                    $this->view('user/register', $this->userForm);
                }
            } else {
                // init userForm
                $this->userForm = $this->form('UserForm');

                // load view
                $this->view('user/register', $this->userForm);
            }
        }

        public function login() {
            // check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init userForm
                foreach ($_POST as $campo => $valor) {
                    $this->userForm->{"set_{$campo}"}(filter_var($valor, FILTER_SANITIZE_STRING));
                }

                 // validate email
                 if(empty($this->userForm->get_email())) {
                    $this->userModel->set_email_err('Please enter e-mail');
                }

                // validate password
                if(empty($this->userForm->get_password())) {
                    $this->userModel->set_password_err('Please enter password');
                }

                // check for user/email
                if($this->userModel->find_user_by_email($this->userForm->get_email())) {
                    // user found
                } else {
                    // user not found
                    $this_userForm->set_email_err('No user found');
                }

                if(empty($this->userForm->get_email_err()) && empty($this->userForm->get_password_err())) {
                    // check and set logged user
                    $loggedInUser = $this->userModel->login($this->userForm->get_email(), $this->userForm->get_password());

                    if($loggedInUser) {
                        // create session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $this->userForm->set_password_err('Password incorrect');

                        $this->view('user/login', $this->userForm);
                    }
                    
                } else {
                    $this->view('user/login', $this->userForm);
                }

            } else {
                // init userForm
                $this->userForm = $this->form('UserForm');

                // load view
                $this->view('user/login', $this->userForm);
            }
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);

            session_destroy();

            redirect('user/login');
        }

        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            
            redirect('post');
        }
    }