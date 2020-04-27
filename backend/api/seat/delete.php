<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type,
     Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Seat.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate worker object
    $seat = new Seat($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // Set seat_ID to update
    $seat->seat_ID = $data->seat_ID;
   

    // Delete Seat
    if($seat->delete()) {
        echo json_encode(
            array('message' => 'Seat ' . $data->seat_ID . ' Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Seat Not Deleted')
        );
    }
