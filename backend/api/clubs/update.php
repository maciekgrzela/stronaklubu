<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
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

    // Set club_ID to update
    $club->club_ID = $data->club_ID;
   
    $club->clubname = $data->clubname;
    $club->city = $data->city;
    $club->stadium = $data->stadium;
    $club->club_address = $data->club_address;
    $club->path_img_logo = $data->path_img_logo;

    // Create club
    if($club->update()) {
        echo json_encode(
            array('message' => 'club ' . $data->club_ID . ' Updated')
        );
    } else {
        echo json_encode(
            array('message' => 'club Not Updated')
        );
    }
