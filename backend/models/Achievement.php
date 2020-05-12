<?php 
    class Achievement {
        // DB stuff
        public $conn;
        public $table = 'achievements';

        // Achievement Properties
        public $achievement_ID;
        public $achievement_year;
        public $achievement_name;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get achievements
        public function read() {
            $query = 'SELECT
                achievement_ID,
                achievement_year,
                achievement_name
                FROM
                ' . $this->table . ' ORDER BY achievement_year ASC';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }  

        // Create Achievement
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET 
                achievement_year = :achievement_year,
                achievement_name = :achievement_name';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->achievement_year = htmlspecialchars(strip_tags($this->achievement_year));
            $this->achievement_name = htmlspecialchars(strip_tags($this->achievement_name));

            // Bind data
            $stmt->bindParam(':achievement_year', $this->achievement_year);
            $stmt->bindParam(':achievement_name', $this->achievement_name);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");
            return false;
        }

        // Delete Achievement
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE achievement_ID = :achievement_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->achievement_ID = htmlspecialchars(strip_tags($this->achievement_ID));

            // Bind achievement_ID
            $stmt->bindParam(':achievement_ID', $this->achievement_ID);

            // Execute query
            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");
            return false;
        }

        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . ' SET 
                achievement_year = :achievement_year,
                achievement_name = :achievement_name WHERE achievement_ID = :achievement_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->achievement_year = htmlspecialchars(strip_tags($this->achievement_year));
            $this->achievement_name = htmlspecialchars(strip_tags($this->achievement_name));
            $this->achievement_ID = htmlspecialchars(strip_tags($this->achievement_ID));

            // Bind data
            $stmt->bindParam(':achievement_year', $this->achievement_year);
            $stmt->bindParam(':achievement_name', $this->achievement_name);
            $stmt->bindParam(':achievement_ID', $this->achievement_ID);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
        }
    }