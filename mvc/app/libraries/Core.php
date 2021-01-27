<?php
    /*
     * App Core Class
     * creates URL & loads core controller
     * URL FORMAT - /controller/method/params
     */
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->getUrl();

            // get controller
            $controller = isset($url[0]) ? ucwords($url[0]) : 'Pages';
            unset($url[0]);

            // get method
            $method = isset($url[1]) ? $url[1] : 'index';
            unset($url[1]);

            // get params
            $params = $url ? array_values($url) : [];

            // instantiate controller
            if(file_exists("../app/controllers/$controller.php")) {
                $this->currentController = $controller;
            }

            require_once "../app/controllers/$this->currentController.php";

            $this->currentController = new $this->currentController;

            // set method from controller
            if($method && method_exists($this->currentController, $method)) {
                $this->currentMethod = $method;
            }

            // set params
            $this->params = $params;

            // call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }