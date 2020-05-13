<?php


class Narrative {

    public $conn;
    public $table = 'Narratives';

    public $narrative_ID;
    public $match_ID;
    public $title;
    public $date;

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    // Get Club
    public function read() {
        $query = 'SELECT
                narrative_ID,
                match_ID,
                title,
                date FROM ' . $this->table .' ORDER BY date';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;

    }

    public function read_single() {
        $query = 'SELECT
                narrative_id,
                match_id,
                title,
                date FROM ' . $this->table .' WHERE narrative_id = ?';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->narrative_ID);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->narrative_ID = $row['narrative_ID'];
        $this->match_ID = $row['match_ID'];
        $this->title = $row['title'];
        $this->date = $row['date'];
    }

    // Create match
    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET
            match_ID = :match_ID,
            title = :title,
            date = :date';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->match_ID = htmlspecialchars(strip_tags($this->match_ID));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->date = htmlspecialchars(strip_tags($this->date));

        // Bind data
        $stmt->bindParam(':match_ID', $this->match_ID);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':date', $this->date);

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
            match_ID = :match_ID,
            title = :title,
            date = :date WHERE narrative_ID = :narrative_ID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->match_ID = htmlspecialchars(strip_tags($this->match_ID));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->narrative_ID = htmlspecialchars(strip_tags($this->narrative_ID));

        // Bind data

        $stmt->bindParam(':match_ID', $this->match_ID);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':narrative_ID', $this->narrative_ID);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n, $stmt->error");

        return false;
    }


    // Delete match
    public function delete() {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE narrative_ID = :narrative_ID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->narrative_ID = htmlspecialchars(strip_tags($this->narrative_ID));


        // Bind match_ID
        $stmt->bindParam('narrative_ID', $this->narrative_ID);


        // Execute query
        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n, $stmt->error");

        return false;

    }
}

?>