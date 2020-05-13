<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Achievement.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate news object
    $achievement = new Achievement($db);

    // Get raw posted data
    // $data = json_decode(file_get_contents("php://input"));
    
    $data = $_POST;
   
    // $achievement->achievement_ID = $data["achievement_ID"];
    $achievement->achievement_year = $data["achievement_year"];
    $achievement->achievement_name = $data["achievement_name"];

    // Create achievement
    if($achievement->create()) {
        echo json_encode(
            array('message' => 'Achievement Created')
        );
    } else {
        echo json_encode(
            array('message' => 'Achievement NOT Created')
        );
    }
