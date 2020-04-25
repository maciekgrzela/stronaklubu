<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Club.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate club object
    $club = new Club($db);

    // Get ID
    $club->club_ID = isset($_GET['club_ID']) ? $_GET['club_ID'] : die();

    // Get club
    $club->read_single();

    // Create array
    $club_arr = array(
        'club_ID' => $club->club_ID,
        'clubname' => $club->clubname,
        'city' => $club->city,
        'stadium' => $club->stadium,
        'club_address' => $club->club_address,
        'path_img_path' => $club->path_img_path
    );

    // Make JSON
    print_r(json_encode($club_arr));

