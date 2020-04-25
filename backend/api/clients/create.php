<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type,
     Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Client.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate client object
    $client = new Client($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

   
    $client->first_name = $data->first_name;
    $client->last_name = $data->last_name;
    $client->email = $data->email;
    $client->date_of_birth = $data->date_of_birth;
    $client->user_login = $data->user_login;
    $client->user_password = $data->user_password;
    $client->create_date = $data->create_date;
    $client->privileges = $data->privileges;
   

    // Create client
    if($client->create()) {
        echo json_encode(
            array('message' => 'client Created')
        );
    } else {
        echo json_encode(
            array('message' => 'client NOT Created')
        );
    }
