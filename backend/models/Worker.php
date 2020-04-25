<?php

    class Worker {

        // DB stuff
        public $conn;
        public $table = 'Workers';

        // Player Properties

        public $worker_ID;
        public $first_name;
        public $last_name;
        public $age;
        public $nationality;
        public $worker_role;
        public $worker_img_path;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Workers
        public function read() {
            $query = 'SELECT
                worker_ID,
                first_name,
                last_name,
                age,
                nationality,
                worker_role,
                worker_img_path FROM ' . $this->table;

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;

        }

        // Get single Worker
        public function read_single() {
            $query = 'SELECT
                worker_ID,
                first_name,
                last_name,
                age,
                nationality,
                worker_role, 
                worker_img_path FROM ' . $this->table . ' WHERE worker_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->worker_ID);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties

            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->age = $row['age'];
            $this->nationality = $row['nationality'];
            $this->worker_role = $row['worker_role'];
            $this->worker_img_path = $row['worker_img_path'];

        }

        // Create Worker
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET 
                first_name = :first_name,
                last_name = :last_name,
                age = :age,
                nationality = :nationality,
                worker_role = :worker_role,
                worker_img_path = :worker_img_path';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->nationality = htmlspecialchars(strip_tags($this->nationality));
            $this->worker_role = htmlspecialchars(strip_tags($this->worker_role));
            $this->worker_img_path = htmlspecialchars(strip_tags($this->worker_img_path));

            // Bind data
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':nationality', $this->nationality);
            $stmt->bindParam(':worker_role', $this->worker_role);
            $stmt->bindParam(':worker_img_path', $this->worker_img_path);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
            
        }

        // Update Worker
        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . ' SET 
                first_name = :first_name,
                last_name = :last_name,
                age = :age,
                nationality = :nationality,
                worker_role = :worker_role,
                worker_img_path WHERE worker_ID = :worker_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->nationality = htmlspecialchars(strip_tags($this->nationality));
            $this->worker_role = htmlspecialchars(strip_tags($this->worker_role));
            $this->worker_img_path = htmlspecialchars(strip_tags($this->worker_img_path));

            // Bind data
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':nationality', $this->nationality);
            $stmt->bindParam(':worker_role', $this->worker_role);
            $stmt->bindParam(':worker_img_path', $this->worker_img_path);
            $stmt->bindParam(':worker_ID', $this->worker_ID);


            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
        }

        // Delete Worker
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE worker_ID = :worker_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->worker_ID = htmlspecialchars(strip_tags($this->worker_ID));


            // Bind player_ID
            $stmt->bindParam('worker_ID', $this->worker_ID);

            
            // Execute query
            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }


    }