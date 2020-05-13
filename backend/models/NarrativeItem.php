<?php


class NarrativeItem
{
    public $conn;
    public $table = 'narrative_items';

    public $item_id;
    public $narrative_id;
    public $author_id;
    public $author_first_name;
    public $author_last_name;
    public $img_path;
    public $text;
    public $date;

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT
                n.item_id,
                n.narrative_id,
                n.author_id,
                w.first_name,
                w.last_name,
                n.img_path,
                n.text,
                n.date FROM ' . $this->table . ' n
                LEFT JOIN
                workers w ON n.author_id = w.worker_ID ORDER BY n.date';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function read_with_narrative($narrative_id) {
        $query = 'SELECT
                n.item_id,
                n.narrative_id,
                n.author_id,
                w.first_name,
                w.last_name,
                n.img_path,
                n.text,
                n.date FROM ' . $this->table . ' n
                LEFT JOIN
                workers w ON n.author_id = w.worker_ID WHERE narrative_id = ? ORDER BY n.date';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $narrative_id);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT
                n.item_id,
                n.narrative_id,
                n.author_id,
                w.first_name,
                w.last_name,
                n.img_path,
                n.text,
                n.date FROM ' . $this->table . ' n
                LEFT JOIN
                workers w ON n.author_id = w.worker_ID WHERE n.item_id = ?';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->item_id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties

        $this->item_id = $row['item_id'];
        $this->narrative_id = $row['narrative_id'];
        $this->author_id = $row['author_id'];
        $this->author_first_name = $row['first_name'];
        $this->author_last_name = $row['last_name'];
        $this->img_path = $row['img_path'];
        $this->text = $row['text'];
        $this->date = $row['date'];
    }

    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET 
                narrative_id = :narrative_id,
                author_id = :author_id,
                img_path = :img_path,
                text = :text,
                date = :date';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->narrative_id = htmlspecialchars(strip_tags($this->narrative_id));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->img_path = htmlspecialchars(strip_tags($this->img_path));
        $this->text = htmlspecialchars(strip_tags($this->text));
        $this->date = htmlspecialchars(strip_tags($this->date));

        // Bind data
        $stmt->bindParam(':narrative_id', $this->narrative_id);
        $stmt->bindParam(':author_id', $this->author_id);
        $stmt->bindParam(':img_path', $this->img_path);
        $stmt->bindParam(':text', $this->text);
        $stmt->bindParam(':date', $this->date);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n, $stmt->error");

        return false;
    }

    public function update() {
        // Create query
        $query = 'UPDATE ' . $this->table . ' SET 
                narrative_id = :narrative_id,
                author_id = :author_id,
                img_path = :img_path,
                text = :text,
                date = :date WHERE item_id = :item_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->narrative_id = htmlspecialchars(strip_tags($this->narrative_id));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->img_path = htmlspecialchars(strip_tags($this->img_path));
        $this->text = htmlspecialchars(strip_tags($this->text));
        $this->date = htmlspecialchars(strip_tags($this->date));

        // Bind data
        $stmt->bindParam(':narrative_id', $this->narrative_id);
        $stmt->bindParam(':author_id', $this->author_id);
        $stmt->bindParam(':img_path', $this->img_path);
        $stmt->bindParam(':text', $this->text);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':item_id', $this->item_id);


        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n, $stmt->error");

        return false;
    }

    public function delete() {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE item_id = :item_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->item_id = htmlspecialchars(strip_tags($this->item_id));


        // Bind news_ID
        $stmt->bindParam('item_id', $this->item_id);


        // Execute query
        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n, $stmt->error");

        return false;
    }
}