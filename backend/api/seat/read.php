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

    // Seat query
    $result = $seat->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any seat
    if($num > 0) {
        // Seat array
        $seats_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $seat_item = array(
                'seat_ID' => $seat_ID,
                'sector' => $sector,
                'seat_value' => $seat_value
            );


            // Push to "data"
            array_push($seats_arr, $seat_item);
           // array_push($players_arr['data'], $player_item);

        }

        // Turn to JSON & output
        echo json_encode($seats_arr);

    } else {
        // No seats
        echo json_encode(
            array('message' => 'No Seats found')
        );
    }

