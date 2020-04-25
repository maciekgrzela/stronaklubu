<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type,
     Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Club.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate club object
    $club = new Club($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // Set club_ID to delete
    $club->club_ID = $data->club_ID;
   

    // Delete club
    if($club->delete()) {
        echo json_encode(
            array('message' => 'club ' . $data->club_ID . ' Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'club Not Deleted')
        );
    }
