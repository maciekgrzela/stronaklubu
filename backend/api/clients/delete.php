<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
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

    // Set client_ID to update
    $client->client_ID = $data->client_ID;
   

    // Delete client
    if($client->delete()) {
        echo json_encode(
            array('message' => 'client ' . $data->client_ID . ' Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'client Not Deleted')
        );
    }
