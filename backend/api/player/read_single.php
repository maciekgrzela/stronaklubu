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

    // Get ID
    $player->player_ID = isset($_GET['player_ID']) ? $_GET['player_ID'] : die();

    // Get player
    $player->read_single();

    // Create array
    $player_arr = array(
        'player_ID' => $player->player_ID,
        'first_name' => $player->first_name,
        'last_name' => $player->last_name,
        'age' => $player->age,
        'height' => $player->height,
        'nationality' => $player->nationality,
        'date_of_birth' => $player->date_of_birth,
        'place_of_birth' => $player->place_of_birth,
        'position' => $player->position,
        'player_value' => $player->player_value,
        'player_img_path' => $player->player_img_path
    );

    // Make JSON
    print_r(json_encode($player_arr));

