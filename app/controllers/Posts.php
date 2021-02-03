<?php
    class Posts extends Controller {
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('users/login');
            }
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }
        public function index() {
            // get posts
            $posts = $this->postModel->getPosts();
            $count = $this->postModel->rowCount();

            $data = [
                'posts' => $posts,
                'count' => $count,
            ];

            $this->view('posts/index', $data);
        }

        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // sanitize post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => trim($_SESSION['user_id']),
                    'title_err' => '',
                    'body_err' => '',
                ];
                
                // validate data
                if(empty($data['title'])) {
                    // die('title');
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])) {
                    // die('body');
                    $data['body_err'] = 'Please enter body';
                }

                // make sure there are no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    // confirm and save
                    if($this->postModel->addPost($data)) {
                        flash('post_message', 'Post Added');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    // load view with errors
                    $this->view('posts/add', $data);
                }
                
            } else {
                $data = [
                    'title' => '',
                    'body' => '',
                ];
                
                $this->view('posts/add', $data);
            }
        }

        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // sanitize post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => trim($_SESSION['user_id']),
                    'title_err' => '',
                    'body_err' => '',
                ];
                
                // validate data
                if(empty($data['title'])) {
                    // die('title');
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])) {
                    // die('body');
                    $data['body_err'] = 'Please enter body';
                }

                // make sure there are no errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
                    // confirm and save
                    if($this->postModel->updatePost($data)) {
                        flash('post_message', 'Post Updated');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    // load view with errors
                    $this->view('posts/edit', $data);
                }
                
            } else {
                // get existing post from model
                $post = $this->postModel->getPostById($id);
                // check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body,
                ];
                
                $this->view('posts/edit', $data);
            }
        }

        public function show($id) {
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user,
            ];

            $this->view('posts/show', $data);
        }

        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // get existing post from model
                $post = $this->postModel->getPostById($id);

                // check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    // flash('post_message', 'You\'re not the owner of this post', 'alert alert-danger');
                    redirect('posts');
                }
                if($this->postModel->deletePost($id)) {
                    flash('post_message', 'Post Removed');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }

            } else {
                redirect('posts');
            }

            $data = [
                'post' => $post,
                'user' => $user,
            ];

            $this->view('posts/show', $data);
        }
    }