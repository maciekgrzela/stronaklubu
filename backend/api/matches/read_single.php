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

    // Get ID
    $match->match_ID = isset($_GET['match_ID']) ? $_GET['match_ID'] : die();

    // Get match
    $match->read_single();

    // Create array
    $match_arr = array(
        'match_ID' => $match->match_ID,
        'club_home_ID' => $match->club_home_ID,
        'club_away_ID' => $match->club_away_ID,
        'stadium' => $match->$stadium,
        'match_address' => $match->match_address,
        'amount_of_spectators' => $match->amount_of_spectators,
        'earnings' => $match->earnings,
        'date_of_match' => $match->date_of_match
    );

    // Make JSON
    print_r(json_encode($match_arr));

