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
        public $client_ID;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get News
        public function read() {
            $query = 'SELECT
                news_ID,
                title,
                content_path,
                news_img_path,
                tags,
                client_ID FROM ' . $this->table;

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;

        }

        // Get single News
        public function read_single() {
            $query = 'SELECT
                news_ID,
                title,
                content_path,
                news_img_path,
                tags,
                client_ID  FROM ' . $this->table . ' WHERE news_ID = ?';

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
            $this->client_ID = $row['client_ID'];

        }

        // Create News
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET 
                title = :title,
                content_path = :content_path,
                news_img_path = :news_img_path,
                tags = :tags,
                client_ID = :client_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->content_path = htmlspecialchars(strip_tags($this->content_path));
            $this->news_img_path = htmlspecialchars(strip_tags($this->news_img_path));
            $this->tags = htmlspecialchars(strip_tags($this->tags));
            $this->client_ID = htmlspecialchars(strip_tags($this->client_ID));

            // Bind data
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':content_path', $this->content_path);
            $stmt->bindParam(':news_img_path', $this->news_img_path);
            $stmt->bindParam(':tags', $this->tags);
            $stmt->bindParam(':client_ID', $this->client_ID);

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
                client_ID = :client_ID WHERE news_ID = :news_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->content_path = htmlspecialchars(strip_tags($this->content_path));
            $this->news_img_path = htmlspecialchars(strip_tags($this->news_img_path));
            $this->tags = htmlspecialchars(strip_tags($this->tags));
            $this->client_ID = htmlspecialchars(strip_tags($this->client_ID));

            // Bind data
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':content_path', $this->content_path);
            $stmt->bindParam(':news_img_path', $this->news_img_path);
            $stmt->bindParam(':tags', $this->tags);
            $stmt->bindParam(':client_ID', $this->client_ID);
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