<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type,
     Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Match.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate match object
    $match = new Match($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // Set match to update
    $match->match_ID = $data->match_ID;
   

    // Delete match
    if($match->delete()) {
        echo json_encode(
            array('message' => 'match ' . $data->match_ID . ' Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'match Not Deleted')
        );
    }
