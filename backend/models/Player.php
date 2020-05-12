<?php

    class Player {

        // DB stuff
        public $conn;
        public $table = 'Players';

        // Player Properties
        public $player_ID;
        public $first_name;
        public $last_name;
        public $age;
        public $height;
        public $nationality;
        public $date_of_birth;
        public $place_of_birth;
        public $position;
        public $player_value;
        public $player_img_path;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Players
        public function read() {
            $query = 'SELECT
                player_ID,
                first_name,
                last_name,
                age,
                height,
                nationality,
                date_of_birth,
                place_of_birth,
                position,
                player_value,
                player_img_path
                FROM
                ' . $this->table;

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }

        public function read_single() {
            $query = 'SELECT
                player_ID,
                first_name,
                last_name,
                age,
                height,
                nationality,
                date_of_birth,
                place_of_birth,
                position,
                player_value,
                player_img_path
                FROM
                ' . $this->table . ' WHERE player_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->player_ID);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->age = $row['age'];
            $this->height = $row['height'];
            $this->nationality = $row['nationality'];
            $this->date_of_birth = $row['date_of_birth'];
            $this->place_of_birth = $row['place_of_birth'];
            $this->position = $row['position'];
            $this->player_value = $row['player_value'];
            $this->player_img_path = $row['player_img_path'];
            
        }

        // Create Player
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET
            first_name = :first_name,
            last_name = :last_name,
            age = :age,
            height = :height,
            nationality = :nationality,
            date_of_birth = :date_of_birth,
            place_of_birth = :place_of_birth,
            position = :position,
            player_value = :player_value,
            player_img_path = :player_img_path';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->height = htmlspecialchars(strip_tags($this->height));
            $this->nationality = htmlspecialchars(strip_tags($this->nationality));
            $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
            $this->place_of_birth = htmlspecialchars(strip_tags($this->place_of_birth));
            $this->position = htmlspecialchars(strip_tags($this->position));
            $this->player_value = htmlspecialchars(strip_tags($this->player_value));
            $this->player_img_path = htmlspecialchars(strip_tags($this->player_img_path));

            // Bind data
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindValue(':age', $this->age);
            $stmt->bindValue(':height', $this->height);
            $stmt->bindParam(':nationality', $this->nationality);
            $stmt->bindParam(':date_of_birth', $this->date_of_birth);
            $stmt->bindParam(':place_of_birth', $this->place_of_birth);
            $stmt->bindParam(':position', $this->position);
            $stmt->bindValue(':player_value', $this->player_value);
            $stmt->bindParam(':player_img_path', $this->player_img_path);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");
            return false;
        }

        // Update Player
        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . ' SET
            first_name = :first_name,
            last_name = :last_name,
            age = :age,
            height = :height,
            nationality = :nationality,
            date_of_birth = :date_of_birth,
            place_of_birth = :place_of_birth,
            position = :position,
            player_value = :player_value,
            player_img_path = :player_img_path WHERE player_ID = :player_ID' ;

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->height = htmlspecialchars(strip_tags($this->height));
            $this->nationality = htmlspecialchars(strip_tags($this->nationality));
            $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
            $this->place_of_birth = htmlspecialchars(strip_tags($this->place_of_birth));
            $this->position = htmlspecialchars(strip_tags($this->position));
            $this->player_value = htmlspecialchars(strip_tags($this->player_value));
            $this->player_img_path = htmlspecialchars(strip_tags($this->player_img_path));
            $this->player_ID = htmlspecialchars(strip_tags($this->player_ID));

            // Bind data
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':height', $this->height);
            $stmt->bindParam(':nationality', $this->nationality);
            $stmt->bindParam(':date_of_birth', $this->date_of_birth);
            $stmt->bindParam(':place_of_birth', $this->place_of_birth);
            $stmt->bindParam(':position', $this->position);
            $stmt->bindParam(':player_value', $this->player_value);
            $stmt->bindParam(':player_img_path', $this->player_img_path);
            $stmt->bindParam(':player_ID', $this->player_ID);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
        }

        // Delete Player
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE player_ID = :player_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->player_ID = htmlspecialchars(strip_tags($this->player_ID));

            // Bind player_ID
            $stmt->bindParam(':player_ID', $this->player_ID);

            // Execute query
            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");
            return false;
        }

    }

?>