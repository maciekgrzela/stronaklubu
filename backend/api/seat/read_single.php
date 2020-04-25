<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Seat.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate seat object
    $seat = new Seat($db);

    // Get ID
    $seat->seat_ID = isset($_GET['seat_ID']) ? $_GET['seat_ID'] : die();

    // Get seat
    $seat->read_single();

    // Create array
    $seats_arr = array(
        'seat_ID' => $seat->seat_ID,
        'sector' => $seat->sector,
        'seat_value' => $seat->seat_value
    );

    // Make JSON
    print_r(json_encode($seats_arr));

