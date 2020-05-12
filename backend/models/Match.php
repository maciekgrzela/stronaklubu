<?php

    class Match {

        // DB stuff
        public $conn;
        public $table = 'Matches';

        // match Properties
        public $match_ID;
        public $club_home_ID;
        public $club_away_ID;
        public $stadium;
        public $match_address;
        public $amount_of_spectators;
        public $earnings;
        public $date_of_match;
        public $clubHomeName;
        public $clubAwayName;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get matchs
        public function read() {
            $query = 'SELECT 
            matches.match_ID, 
            c.clubname as clubHomeName, 
            z.clubname as clubAwayName, 
            matches.stadium, 
            matches.match_address, 
            matches.amount_of_spectators, 
            matches.earnings, 
            matches.date_of_match 
            FROM matches 
            INNER JOIN clubs c 
            ON matches.club_home_ID = c.club_ID 
            INNER JOIN clubs z 
            ON matches.club_away_ID = z.club_ID
            ';

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
            date_of_match = :date_of_match WHERE match_ID = :match_ID';

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