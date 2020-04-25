<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
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

   
    $match->club_home_ID = $data->club_home_ID;
    $match->club_away_ID = $data->club_away_ID;
    $match->stadium = $data->stadium;
    $match->match_address = $data->match_address;
    $match->amount_of_spectators = $data->amount_of_spectators;
    $match->earnings = $data->earnings;
    $match->date_of_match = $data->date_of_match;
   

    // Create match
    if($match->create()) {
        echo json_encode(
            array('message' => 'match Created')
        );
    } else {
        echo json_encode(
            array('message' => 'match NOT Created')
        );
    }
