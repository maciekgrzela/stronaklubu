<?php

    class News {

        // DB stuff
        public $conn;
        public $table = 'News';

        // News Properties

        public $news_ID;
        public $title;
        public $content_path;
        public $news_img_path;
        public $tags;
        public $created_at;
        public $worker_ID;
        public $last_commented;
        public $viewers;
        public $worker_first_name;
        public $worker_last_name;
        public $worker_age;
        public $worker_nationality;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get News
        public function read() {
            $query = 'SELECT
                n.news_ID,
                n.title,
                n.content_path,
                n.news_img_path,
                n.tags,
                n.created_at,
                n.last_commented,
                n.viewers,
                w.first_name as worker_first_name,
                w.last_name as worker_last_name,
                w.age as worker_age,
                w.nationality as worker_nationality 
                FROM ' . $this->table . ' n
                LEFT JOIN
                    workers w ON n.worker_ID = w.worker_ID
                ORDER BY created_at';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // Get Ticket by author
        public function read_specific($worker_ID) {


            $query = 'SELECT 
            news_ID, 
            title, 
            content_path, 
            news_img_path, 
            created_at,
            tags,
            viewers,
            worker_ID
            FROM ' . $this->table . ' 
            WHERE worker_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $worker_ID);

            // Execute query
            $stmt->execute();

            return $stmt;
        }   

        // Get single News
        public function read_single() {
            $query = 'SELECT
                n.news_ID,
                n.title,
                n.content_path,
                n.news_img_path,
                n.tags,
                n.created_at,
                n.last_commented,
                n.viewers,
                w.first_name as worker_first_name,
                w.last_name as worker_last_name,
                w.age as worker_age,
                w.nationality as worker_nationality 
                FROM ' . $this->table . ' n
                LEFT JOIN
                    workers w ON n.worker_ID = w.worker_ID
                WHERE n.news_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->news_ID);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties

            $this->title = $row['title'];
            $this->content_path = $row['content_path'];
            $this->news_img_path = $row['news_img_path'];
            $this->tags = $row['tags'];
            $this->created_at = $row['created_at'];
            $this->worker_first_name = $row['worker_first_name'];
            $this->worker_last_name = $row['worker_last_name'];
            $this->worker_age = $row['worker_age'];
            $this->worker_nationality = $row['worker_nationality'];
        }

        public function read_last_commented() {
            $query = 'SELECT 
                    news_ID,
                    title,
                    content_path,
                    news_img_path,
                    tags,
                    created_at,
                    last_commented,
                    viewers,
                    worker_ID FROM ' . $this->table . ' ORDER BY last_commented DESC LIMIT 1';

            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        public function read_most_popular() {
            $query = 'SELECT 
                    news_ID,
                    title,
                    content_path,
                    news_img_path,
                    tags,
                    created_at,
                    last_commented,
                    viewers,
                    worker_ID FROM ' . $this->table . ' ORDER BY viewers DESC LIMIT 1';

            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // Create News
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET 
                title = :title,
                content_path = :content_path,
                news_img_path = :news_img_path,
                tags = :tags,
                worker_ID = :worker_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->content_path = htmlspecialchars(strip_tags($this->content_path));
            $this->news_img_path = htmlspecialchars(strip_tags($this->news_img_path));
            $this->tags = htmlspecialchars(strip_tags($this->tags));
            $this->worker_ID = htmlspecialchars(strip_tags($this->worker_ID));

            // Bind data
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':content_path', $this->content_path);
            $stmt->bindParam(':news_img_path', $this->news_img_path);
            $stmt->bindParam(':tags', $this->tags);
            $stmt->bindParam(':worker_ID', $this->worker_ID);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
            
        }

        // Update News
        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . ' SET 
                title = :title,
                content_path = :content_path,
                news_img_path = :news_img_path,
                tags = :tags,
                worker_ID = :worker_ID WHERE news_ID = :news_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->content_path = htmlspecialchars(strip_tags($this->content_path));
            $this->news_img_path = htmlspecialchars(strip_tags($this->news_img_path));
            $this->tags = htmlspecialchars(strip_tags($this->tags));
            $this->worker_ID = htmlspecialchars(strip_tags($this->worker_ID));

            // Bind data
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':content_path', $this->content_path);
            $stmt->bindParam(':news_img_path', $this->news_img_path);
            $stmt->bindParam(':tags', $this->tags);
            $stmt->bindParam(':worker_ID', $this->worker_ID);
            $stmt->bindParam(':news_ID', $this->news_ID);


            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
        }

        // Delete News
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE news_ID = :news_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->news_ID = htmlspecialchars(strip_tags($this->news_ID));


            // Bind news_ID
            $stmt->bindParam('news_ID', $this->news_ID);

            
            // Execute query
            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }


    }