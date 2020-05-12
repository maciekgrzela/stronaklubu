<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Match.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate match object
    $match = new Match($db);

    // match query
    $result = $match->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any match
    if($num > 0) {
        // match array
        $matchs_arr = array();
        //$matchs_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $match_item = array(
                'match_ID' => $match_ID,
                'clubHomeName' => $clubHomeName,
                'clubAwayName' => $clubAwayName,
                'stadium' => $stadium,
                'match_address' => $match_address,
                'amount_of_spectators' => $amount_of_spectators,
                'earnings' => $earnings,
                'date_of_match' => $date_of_match
            );

            // Push to "data"
            array_push($matchs_arr, $match_item);
           // array_push($matchs_arr['data'], $match_item);

        }

        // Turn to JSON & output
        echo json_encode($matchs_arr);

    } else {
        // No matchs
        echo json_encode(
            array('message' => 'No matchs found')
        );
    }
