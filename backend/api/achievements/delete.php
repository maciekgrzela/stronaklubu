<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Achievement.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate achievement object
    $achievement = new Achievement($db);

    // Get raw posted data
    //$data = json_decode(file_get_contents("php://input"));

    $data = $_POST;

    // Set achievement_ID to update
    $achievement->achievement_ID = $data["achievement_ID"];
   
    // Delete achievement
    if($achievement->delete()) {
        echo json_encode(
            array('message' => 'achievement  Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'achievement Not Deleted')
        );
    }
