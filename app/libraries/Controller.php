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

        public function view($view, $data = []) {
            if(file_exists("../app/views/$view.php")) {
                require_once "../app/views/$view.php";
            } else {
                // recommendation: create 404 page
                die('View not found');
            }
        }
    }