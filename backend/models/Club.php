<?php

    class Club {

        // DB stuff
        public $conn;
        public $table = 'Clubs';

        // Club Properties

        public $club_ID;
        public $clubname;
        public $city;
        public $stadium;
        public $club_address;
        public $path_img_logo;
        public $league_position;
        public $league_points;
        public $league_matches;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Club
        public function read() {
            $query = 'SELECT
                club_ID,
                clubname,
                city,
                stadium,
                club_address,
                path_img_logo,
                league_position,
                league_points,
                league_matches FROM ' . $this->table .' ORDER BY league_position';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;

        }

        // Get single Club
        public function read_single() {
            $query = 'SELECT
                club_ID,
                clubname,
                city,
                stadium,
                club_address,
                path_img_logo,
                league_position,
                league_points,
                league_matches  FROM ' . $this->table . ' WHERE club_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->club_ID);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties

            $this->clubname = $row['clubname'];
            $this->city = $row['city'];
            $this->stadium = $row['stadium'];
            $this->club_address = $row['club_address'];
            $this->path_img_logo = $row['path_img_logo'];
            $this->league_position = $row['league_position'];
            $this->league_points = $row['league_points'];
            $this->league_matches = $row['league_matches'];
        }

        // Create Club
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET 
                clubname = :clubname,
                city = :city,
                stadium = :stadium,
                club_address = :club_address,
                path_img_logo = :path_img_logo';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->clubname = htmlspecialchars(strip_tags($this->clubname));
            $this->city = htmlspecialchars(strip_tags($this->city));
            $this->stadium = htmlspecialchars(strip_tags($this->stadium));
            $this->club_address = htmlspecialchars(strip_tags($this->club_address));
            $this->path_img_logo = htmlspecialchars(strip_tags($this->path_img_logo));

            // Bind data
            $stmt->bindParam(':clubname', $this->clubname);
            $stmt->bindParam(':city', $this->city);
            $stmt->bindParam(':stadium', $this->stadium);
            $stmt->bindParam(':club_address', $this->club_address);
            $stmt->bindParam(':path_img_logo', $this->path_img_logo);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
            
        }

        // Update Club
        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . ' SET 
                clubname = :clubname,
                city = :city,
                stadium = :stadium,
                club_address = :club_address,
                path_img_logo = :path_img_logo WHERE club_ID = :club_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->clubname = htmlspecialchars(strip_tags($this->clubname));
            $this->city = htmlspecialchars(strip_tags($this->city));
            $this->stadium = htmlspecialchars(strip_tags($this->stadium));
            $this->club_address = htmlspecialchars(strip_tags($this->club_address));
            $this->path_img_logo = htmlspecialchars(strip_tags($this->path_img_logo));

            // Bind data
            $stmt->bindParam(':clubname', $this->clubname);
            $stmt->bindParam(':city', $this->city);
            $stmt->bindParam(':stadium', $this->stadium);
            $stmt->bindParam(':club_address', $this->club_address);
            $stmt->bindParam(':path_img_logo', $this->path_img_logo);
            $stmt->bindParam(':club_ID', $this->club_ID);


            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
        }

        // Delete Club
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE club_ID = :club_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->club_ID = htmlspecialchars(strip_tags($this->club_ID));


            // Bind club_ID
            $stmt->bindParam('club_ID', $this->club_ID);

            
            // Execute query
            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }


    }