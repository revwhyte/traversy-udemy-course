<?php
    class Post {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query(
                'SELECT
                    *,
                    posts.id as postId,
                    users.id as userId,
                    posts.created_at as post_dt,
                    users.created_at as user_dt
                 FROM posts
                 INNER JOIN users ON users.id = posts.user_id
                 ORDER BY posts.created_at DESC'
            );

            return $this->db->resultSet();
        }

        public function getPostById($id) {
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            
            $this->db->bind(':id', $id);

            return $this->db->single();
        }

        public function addPost($data) {
            $this->db->query(
                'INSERT INTO posts
                    (title, user_id, body)
                VALUES
                    (:title, :user_id, :body)
            ');
            
            // bind value
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);

            // execute
            return $this->db->execute() ? true : false;
        }

        public function updatePost($data) {
            $this->db->query(
                'UPDATE posts SET
                    title = :title,
                    body = :body
                WHERE id = :id'
            );

            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);

            return $this->db->execute();
        }

        public function deletePost($id) {
            $this->db->query('DELETE FROM posts WHERE id = :id');

            $this->db->bind(':id', $id);

            return $this->db->execute();
        }

        public function rowCount() {
            return $this->db->rowCount();
        }
    }