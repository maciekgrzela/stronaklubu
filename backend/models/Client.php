<?php

    class Client {

        // DB stuff
        public $conn;
        public $table = 'Clients';

        // Client Properties
        public $client_ID;
        public $first_name;
        public $last_name;
        public $email;
        public $date_of_birth;
        public $user_login;
        public $password;
        public $create_date;
        public $privileges;


        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get clients
        public function read() {
            $query = 'SELECT
                client_ID,
                first_name,
                last_name,
                email,
                date_of_birth,
                user_login,
                user_password,
                create_date,
                privileges
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
                client_ID,
                first_name,
                last_name,
                email,
                date_of_birth,
                user_login,
                user_password,
                create_date,
                privileges
                FROM
                ' . $this->table . ' WHERE client_ID = ?';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->client_ID);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->email = $row['email'];
            $this->date_of_birth = $row['date_of_birth'];
            $this->user_login = $row['user_login'];
            $this->user_password = $row['user_password'];
            $this->create_date = $row['create_date'];
            $this->privileges = $row['privileges'];
            
        }


        // Create client
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . ' SET
            first_name = :first_name,
            last_name = :last_name,
            email = :email,
            date_of_birth = :date_of_birth,
            user_login = :user_login,
            user_password = :user_password,
            create_date = :create_date,
            privileges = :privileges';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
            $this->user_login = htmlspecialchars(strip_tags($this->user_login));
            $this->user_password = htmlspecialchars(strip_tags($this->user_password));
            $this->create_date = htmlspecialchars(strip_tags($this->create_date));
            $this->privileges = htmlspecialchars(strip_tags($this->privileges));

            // Bind data

            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':date_of_birth', $this->date_of_birth);
            $stmt->bindParam(':user_login', $this->user_login);
            $stmt->bindParam(':user_password', $this->user_password);
            $stmt->bindParam(':create_date', $this->create_date);
            $stmt->bindParam(':privileges', $this->privileges);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }

        // Update client
        public function update() {
            // Create query
            $query = 'UPDATE ' . $this->table . ' SET
            first_name = :first_name,
            last_name = :last_name,
            email = :email,
            date_of_birth = :date_of_birth,
            user_login = :user_login,
            user_password = :user_password,
            create_date = :create_date,
            privileges = :privileges WHERE client_ID = :client_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
            $this->user_login = htmlspecialchars(strip_tags($this->user_login));
            $this->user_password = htmlspecialchars(strip_tags($this->user_password));
            $this->create_date = htmlspecialchars(strip_tags($this->create_date));
            $this->privileges = htmlspecialchars(strip_tags($this->privileges));
            $this->client_ID = htmlspecialchars(strip_tags($this->client_ID));

            // Bind data

            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':date_of_birth', $this->date_of_birth);
            $stmt->bindParam(':user_login', $this->user_login);
            $stmt->bindParam(':user_password', $this->user_password);
            $stmt->bindParam(':create_date', $this->create_date);
            $stmt->bindParam(':privileges', $this->privileges);
            $stmt->bindParam(':client_ID', $this->client_ID);

            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;
        }


        // Delete client
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE client_ID = :client_ID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->client_ID = htmlspecialchars(strip_tags($this->client_ID));


            // Bind client_ID
            $stmt->bindParam('client_ID', $this->client_ID);

            
            // Execute query
            if($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n, $stmt->error");

            return false;

        }

    }

?>