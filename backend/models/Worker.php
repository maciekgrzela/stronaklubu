<?php

    class Worker {

        // DB stuff
        public $conn;
        public $table = 'Workers';

        // Player Properties

        public $worker_ID;
        public $first_name;
        public $last_name;
        public $age;
        public $nationality;
        public $mail;
        public $is_journalist;
        public $is_executive;
        public $is_staff;
        public $worker_login;
        public $worker_password;
        public $worker_img_path;
        public $worker_date_of_birth;
        public $create_date;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Workers
        public function read() {
            $query = 'SELECT
                worker_ID,
                first_name,
                last_name,
                age,
                nationality,
                mail,
                is_journalist,
                is_executive,
                is_staff,
                worker_login,
                worker_password,
                worker_date_of_birth,
                worker_img_path,
                create_date FROM ' . $this->table;

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;

        }

        // Get single Worker
        public function read_single() {
            $query = 'SELECT
                worker_ID,
                first_name,
                last_name,
                age,
                nationality,
                mail,
                is_journalist,
                is_executive,
                is_staff,
                worker_login,
                worker_password,
                worker_date_of_birth,
                worker_img_path, 
                create_date FROM ' . $this->table . ' WHERE worker_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->worker_ID);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties

            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->age = $row['age'];
            $this->nationality = $row['nationality'];
            $this->mail = $row['mail'];
            $this->is_executive = $row['is_executive'];
            $this->is_journalist = $row['is_journalist'];
            $this->is_staff = $row['is_staff'];
            $this->worker_login = $row['worker_login'];
            $this->worker_password = $row['worker_password'];
            $this->worker_img_path = $row['worker_img_path'];
            $this->worker_date_of_birth = $row['worker_date_of_birth'];
            $this->create_date = $row['create_date'];
        }

        // Create Worker
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET 
                first_name = :first_name,
                last_name = :last_name,
                age = :age,
                nationality = :nationality,
                mail = :mail,
                is_journalist = :is_journalist,
                is_executive = :is_executive,
                is_staff = :is_staff,
                worker_login = :worker_login,
                worker_password = :worker_password,
                worker_date_of_birth = :worker_date_of_birth,
                worker_img_path = :worker_img_path';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->nationality = htmlspecialchars(strip_tags($this->nationality));
            $this->mail = htmlspecialchars(strip_tags($this->mail));
            $this->is_staff = htmlspecialchars(strip_tags($this->is_staff));
            $this->is_journalist = htmlspecialchars(strip_tags($this->is_journalist));
            $this->is_executive = htmlspecialchars(strip_tags($this->is_executive));
            $this->worker_login = htmlspecialchars(strip_tags($this->worker_login));
            $this->worker_password = htmlspecialchars(strip_tags($this->worker_password));
            $this->worker_date_of_birth = htmlspecialchars(strip_tags($this->worker_date_of_birth));
            $this->worker_img_path = htmlspecialchars(strip_tags($this->worker_img_path));

            // Bind data
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':nationality', $this->nationality);
            $stmt->bindParam(':mail', $this->mail);
            $stmt->bindParam(':is_journalist', $this->is_journalist);
            $stmt->bindParam(':is_executive', $this->is_executive);
            $stmt->bindParam(':is_staff', $this->is_staff);
            $stmt->bindParam(':worker_login', $this->worker_login);
            $stmt->bindParam(':worker_password', $this->worker_password);
            $stmt->bindParam(':worker_date_of_birth', $this->worker_date_of_birth);
            $stmt->bindParam(':worker_img_path', $this->worker_img_path);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
            
        }

        // Update Worker
        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . ' SET 
                first_name = :first_name,
                last_name = :last_name,
                age = :age,
                nationality = :nationality,
                mail = :mail,
                is_journalist = :is_journalist,
                is_executive = :is_executive,
                is_staff = :is_staff,
                worker_login = :worker_login,
                worker_password = :worker_password,
                worker_date_of_birth = :worker_date_of_birth,
                worker_img_path = :worker_img_path WHERE worker_ID = :worker_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->nationality = htmlspecialchars(strip_tags($this->nationality));
            $this->mail = htmlspecialchars(strip_tags($this->mail));
            $this->is_staff = htmlspecialchars(strip_tags($this->is_staff));
            $this->is_journalist = htmlspecialchars(strip_tags($this->is_journalist));
            $this->is_executive = htmlspecialchars(strip_tags($this->is_executive));
            $this->worker_login = htmlspecialchars(strip_tags($this->worker_login));
            $this->worker_password = htmlspecialchars(strip_tags($this->worker_password));
            $this->worker_date_of_birth = htmlspecialchars(strip_tags($this->worker_date_of_birth));
            $this->worker_img_path = htmlspecialchars(strip_tags($this->worker_img_path));

            // Bind data
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':nationality', $this->nationality);
            $stmt->bindParam(':mail', $this->mail);
            $stmt->bindParam(':is_journalist', $this->is_journalist);
            $stmt->bindParam(':is_executive', $this->is_executive);
            $stmt->bindParam(':is_staff', $this->is_staff);
            $stmt->bindParam(':worker_login', $this->worker_login);
            $stmt->bindParam(':worker_password', $this->worker_password);
            $stmt->bindParam(':worker_date_of_birth', $this->worker_date_of_birth);
            $stmt->bindParam(':worker_img_path', $this->worker_img_path);


            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
        }

        // Delete Worker
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE worker_ID = :worker_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->worker_ID = htmlspecialchars(strip_tags($this->worker_ID));


            // Bind player_ID
            $stmt->bindParam('worker_ID', $this->worker_ID);

            
            // Execute query
            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }


    }