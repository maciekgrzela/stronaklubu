<?php


class Ticket
{

    // DB stuff
    public $conn;
    public $table = 'Tickets';

    // Seat Properties
    public $ticket_ID;
    public $client_ID;
    public $seat;
    public $match_ID;

    public $clubHome;
    public $clubAway;
    public $match_date;

    //SELECT ticket_ID, clubHome, clubAway, seat, match_date FROM `tickets` WHERE client_ID = 1

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET
            client_ID = :client_ID,
            seat = :seat,
            match_ID = :match_ID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->client_ID = htmlspecialchars(strip_tags($this->client_ID));
        $this->seat = htmlspecialchars(strip_tags($this->seat));
        $this->match_ID = htmlspecialchars(strip_tags($this->match_ID));


        // Bind data

        $stmt->bindParam(':client_ID', $this->client_ID);
        $stmt->bindParam(':seat', $this->seat);
        $stmt->bindParam(':match_ID', $this->match_ID);


        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n, $stmt->error");

        return false;

    }

        // Get specific Ticket
        public function read_specific($client_ID) {


            $query = 'SELECT 
            ticket_ID, 
            c1.clubname as clubHome, 
            c2.clubname as clubAway, 
            seat, 
            m.date_of_match as match_date
            FROM ' . $this->table . ' t 
            INNER JOIN matches m 
            ON t.match_ID = m.match_ID 
            INNER JOIN clubs c1 
            ON c1.club_ID = m.club_home_ID 
            INNER JOIN clubs c2 ON c2.club_ID = m.club_away_ID 
            WHERE client_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $client_ID);

            // Execute query
            $stmt->execute();

            return $stmt;
        }    

}