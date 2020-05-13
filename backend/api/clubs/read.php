<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Club.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate club object
    $club = new Club($db);

    // club query
    $result = $club->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any club
    if($num > 0) {
        // club array
        $clubs_arr = array();
        //$clubs_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $club_item = array(
                'club_ID' => $club_ID,
                'clubname' => $clubname,
                'city' => $city,
                'stadium' => $stadium,
                'club_address' => $club_address,
                'path_img_logo' => $path_img_logo,
                'league_position' => $league_position,
                'league_points' => $league_points,
                'league_matches' => $league_matches
            );


            // Push to "data"
            array_push($clubs_arr, $club_item);
           // array_push($clubs_arr['data'], $club_item);

        }

        // Turn to JSON & output
        echo json_encode($clubs_arr);

    } else {
        // No clubs
        echo json_encode(
            array('message' => 'No clubs found')
        );
    }

