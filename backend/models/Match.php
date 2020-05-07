<?php

    class Match {

        // DB stuff
        public $conn;
        public $table = 'Matches';

        // match Properties
        public $match_ID;
        public $club_home_ID;
        public $club_home_clubname;
        public $club_home_city;
        public $club_home_path_img_logo;
        public $club_away_ID;
        public $club_away_clubname;
        public $club_away_city;
        public $club_away_path_img_logo;
        public $stadium;
        public $match_address;
        public $amount_of_spectators;
        public $earnings;
        public $date_of_match;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get matchs
        public function read() {
            $query = 'SELECT
                m.match_ID,
                c1.club_ID as club1_ID,
                c1.clubname as club1_clubname,
                c1.city as club1_city,
                c1.path_img_logo as club1_path_img_logo,
                c2.club_ID as club2_ID,
                c2.clubname as club2_clubname,
                c2.city as club2_city,
                c2.path_img_logo as club2_path_img_logo,
                m.stadium,
                m.match_address,
                m.amount_of_spectators,
                m.earnings,
                m.date_of_match
                FROM
                ' . $this->table .' m
                LEFT JOIN clubs c1 ON  c1.club_ID = m.club_home_ID
                LEFT JOIN clubs c2 ON c2.club_ID = m.club_away_ID ORDER BY m.date_of_match';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }

        public function read_single() {
            $query = 'SELECT
                match_ID,
                club_home_ID,
                club_away_ID,
                stadium,
                match_address,
                amount_of_spectators,
                earnings,
                date_of_match
                FROM
                ' . $this->table . ' WHERE match_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->match_ID);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties
            $this->club_home_ID = $row['club_home_ID'];
            $this->club_away_ID = $row['club_away_ID'];
            $this->stadium = $row['stadium'];
            $this->match_address = $row['match_address'];
            $this->amount_of_spectators = $row['amount_of_spectators'];
            $this->earnings = $row['earnings'];
            $this->date_of_match = $row['date_of_match'];
            
        }

        // Create match
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET
            club_home_ID = :club_home_ID,
            club_away_ID = :club_away_ID,
            stadium = :stadium,
            match_address = :match_address,
            amount_of_spectators = :amount_of_spectators,
            earnings = :earnings,
            date_of_match = :date_of_match';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->club_home_ID = htmlspecialchars(strip_tags($this->club_home_ID));
            $this->club_away_ID = htmlspecialchars(strip_tags($this->club_away_ID));
            $this->stadium = htmlspecialchars(strip_tags($this->stadium));
            $this->match_address = htmlspecialchars(strip_tags($this->match_address));
            $this->amount_of_spectators = htmlspecialchars(strip_tags($this->amount_of_spectators));
            $this->earnings = htmlspecialchars(strip_tags($this->earnings));
            $this->date_of_match = htmlspecialchars(strip_tags($this->date_of_match));


            // Bind data

            $stmt->bindParam(':club_home_ID', $this->club_home_ID);
            $stmt->bindParam(':club_away_ID', $this->club_away_ID);
            $stmt->bindParam(':stadium', $this->stadium);
            $stmt->bindParam(':match_address', $this->match_address);
            $stmt->bindParam(':amount_of_spectators', $this->amount_of_spectators);
            $stmt->bindParam(':earnings', $this->earnings);
            $stmt->bindParam(':date_of_match', $this->date_of_match);


            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }

        // Update match
        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . ' SET
            club_home_ID = :club_home_ID,
            club_away_ID = :club_away_ID,
            stadium = :stadium,
            match_address = :match_address,
            amount_of_spectators = :amount_of_spectators,
            earnings = :earnings,
            date_of_match = :date_of_match';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->club_home_ID = htmlspecialchars(strip_tags($this->club_home_ID));
            $this->club_away_ID = htmlspecialchars(strip_tags($this->club_away_ID));
            $this->stadium = htmlspecialchars(strip_tags($this->stadium));
            $this->match_address = htmlspecialchars(strip_tags($this->match_address));
            $this->amount_of_spectators = htmlspecialchars(strip_tags($this->amount_of_spectators));
            $this->earnings = htmlspecialchars(strip_tags($this->earnings));
            $this->date_of_match = htmlspecialchars(strip_tags($this->date_of_match));
            $this->match_ID = htmlspecialchars(strip_tags($this->match_ID));

            // Bind data

            $stmt->bindParam(':club_home_ID', $this->club_home_ID);
            $stmt->bindParam(':club_away_ID', $this->club_away_ID);
            $stmt->bindParam(':stadium', $this->stadium);
            $stmt->bindParam(':match_address', $this->match_address);
            $stmt->bindParam(':amount_of_spectators', $this->amount_of_spectators);
            $stmt->bindParam(':earnings', $this->earnings);
            $stmt->bindParam(':date_of_match', $this->date_of_match);
            $stmt->bindParam(':match_ID', $this->match_ID);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
        }


        // Delete match
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE match_ID = :match_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->match_ID = htmlspecialchars(strip_tags($this->match_ID));


            // Bind match_ID
            $stmt->bindParam('match_ID', $this->match_ID);

            
            // Execute query
            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }

    }

?>