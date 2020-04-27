<?php

    class Seat {

        // DB stuff
        public $conn;
        public $table = 'Seats';

        // Seat Properties
        public $seat_ID;
        public $sector;
        public $value;
    

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Seats
        public function read() {
            $query = 'SELECT
                seat_ID,
                sector,
                seat_value
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
                seat_ID,
                sector,
                seat_value
                FROM
                ' . $this->table . ' WHERE seat_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->seat_ID);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties
            $this->sector = $row['sector'];
            $this->seat_value = $row['seat_value'];
            
            
        }


        // Create Seat
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET
            sector = :sector,
            seat_value = :seat_value';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->sector = htmlspecialchars(strip_tags($this->sector));
            $this->seat_value = htmlspecialchars(strip_tags($this->seat_value));
            

            // Bind data

            $stmt->bindParam(':sector', $this->sector);
            $stmt->bindParam(':seat_value', $this->seat_value);
            

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }

        // Update Seat
        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . ' SET
            sector = :sector,
            seat_value = :seat_value 
            WHERE seat_ID = :seat_ID' ;

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->sector = htmlspecialchars(strip_tags($this->sector));
            $this->seat_value = htmlspecialchars(strip_tags($this->seat_value));
            $this->seat_ID = htmlspecialchars(strip_tags($this->seat_ID));

            // Bind data
            $stmt->bindParam(':sector', $this->sector);
            $stmt->bindParam(':seat_value', $this->seat_value);
            $stmt->bindParam(':seat_ID', $this->seat_ID);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
        }


        // Delete Seat
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE seat_ID = :seat_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->seat_ID = htmlspecialchars(strip_tags($this->seat_ID));


            // Bind seat_ID
            $stmt->bindParam('seat_ID', $this->seat_ID);

            
            // Execute query
            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }

    }

?>