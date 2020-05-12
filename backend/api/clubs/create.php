<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type,
     Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Club.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Club object
    $club = new Club($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

   
    $club->clubname = $data->clubname;
    $club->city = $data->city;
    $club->stadium = $data->stadium;
    $club->club_address = $data->club_address;
    $club->path_img_logo = $data->path_img_logo;
    
    // Create club
    if($club->create()) {
        echo json_encode(
            array('message' => 'club Created')
        );
    } else {
        echo json_encode(
            array('message' => 'club NOT Created')
        );
    }
