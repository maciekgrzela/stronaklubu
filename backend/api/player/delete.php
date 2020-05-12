<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Player.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate player object
    $player = new Player($db);

    // Get raw posted data
    $data = $_POST;
  
    // Set player_ID to update
    $player->player_ID = $data["player_ID"];
   
    // Delete player
    if($player->delete()) {
        echo json_encode(
            array('message' => 'Player  Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Player Not Deleted')
        );
    }
