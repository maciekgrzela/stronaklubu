<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Client.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate client object
    $client = new Client($db);

    // client query
    $result = $client->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any client
    if($num > 0) {
        // client array
        $clients_arr = array();
        //$clients_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $client_item = array(
                'client_ID' => $client_ID,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'date_of_birth' => $date_of_birth,
                'user_login' => $user_login,
                'user_password' => $user_password,
                'create_date' => $create_date,
                'privileges' => $privileges
            );


            // Push to "data"
            array_push($clients_arr, $client_item);
           // array_push($clients_arr['data'], $client_item);

        }

        // Turn to JSON & output
        echo json_encode($clients_arr);

    } else {
        // No clients
        echo json_encode(
            array('message' => 'No clients found')
        );
    }

