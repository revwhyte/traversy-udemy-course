<?php
    /*
     * Base Controller
     * loads the models and views 
     */
    class Controller {
        public function model($model) {
            require_once "../app/models/$model.php";

            return new $model();
        }

        // old
        public function form($form) {
            require_once "../app/forms/$form.php";

            return new $form();
        }

        public function view($view, $data = []) {
            if(file_exists("../app/views/$view.php")) {
                require_once "../app/views/$view.php";
            } else {
                die('View not found');
            }
        }
    }