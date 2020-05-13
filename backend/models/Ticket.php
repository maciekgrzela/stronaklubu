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

}