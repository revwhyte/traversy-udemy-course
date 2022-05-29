<?php
    class PostController extends Controller {
        public function __construct() {
            // $this->postModel = $this->model('Post');
            // $this->postForm = $this->form('PostForm');
        }

        public function index() {

            $data = [
                'title' => 'Your Posts',
                'description' => 'These are your latest posts'
            ];

            $this->view('post/index', $data);
        }
    }