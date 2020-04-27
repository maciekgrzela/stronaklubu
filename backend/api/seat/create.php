<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type,
     Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Seat.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate seat object
    $seat = new Seat($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

   
    $seat->sector = $data->sector;
    $seat->seat_value = $data->seat_value;
   

    // Create seat
    if($seat->create()) {
        echo json_encode(
            array('message' => 'Seat Created')
        );
    } else {
        echo json_encode(
            array('message' => 'Seat NOT Created')
        );
    }
