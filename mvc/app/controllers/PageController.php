<?php
    class PageController extends Controller {
        public function __construct() {
        }

        public function index() {

            $data = [
                'title' => 'Share Posts',
                'description' => 'App to share posts'
            ];

            $this->view('page/index', $data);
        }
        
        public function about() {
            $data = [
                'title' => 'About Us',
                'description' => 'App to share posts'
            ];

            $this->view('page/about', $data);
        }
    }