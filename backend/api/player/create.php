<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Player.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate player object
    $player = new Player($db);

    // Get raw posted data
    // $data = json_decode(file_get_contents("php://input"));
    $data = $_POST;

    $player->first_name = $data["first_name"];
    $player->last_name = $data["last_name"];
    $player->age = $data["age"];
    $player->height = $data["height"];
    $player->nationality = $data["nationality"];
    $player->date_of_birth = $data["date_of_birth"];
    $player->place_of_birth = $data["place_of_birth"];
    $player->position = $data["position"];
    $player->player_value = $data["player_value"];
    $player->player_img_path = $data["player_img_path"];

    // Create player
    if($player->create()) {
        echo json_encode(
            array('message' => 'Player Created')
        );
    } else {
        echo json_encode(
            array('message' => 'Player Not Created')
        );
    }
