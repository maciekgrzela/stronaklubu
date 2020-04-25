<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Player.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate player object
    $player = new Player($db);

    // Player query
    $result = $player->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any player
    if($num > 0) {
        // Player array
        $players_arr = array();
        //$players_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $player_item = array(
                'player_ID' => $player_ID,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'age' => $age,
                'height' => $height,
                'nationality' => $nationality,
                'date_of_birth' => $date_of_birth,
                'place_of_birth' => $place_of_birth,
                'position' => $position,
                'player_value' => $player_value,
                'player_img_path' => $player_img_path
            );


            // Push to "data"
            array_push($players_arr, $player_item);
           // array_push($players_arr['data'], $player_item);

        }

        // Turn to JSON & output
        echo json_encode($players_arr);

    } else {
        // No players
        echo json_encode(
            array('message' => 'No Players found')
        );
    }

