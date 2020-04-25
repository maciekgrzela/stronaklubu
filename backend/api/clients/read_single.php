<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Client.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate client object
    $client = new Client($db);

    // Get ID
    $client->client_ID = isset($_GET['client_ID']) ? $_GET['client_ID'] : die();

    // Get client
    $client->read_single();

    // Create array
    $clients_arr = array(
        'client_ID' => $client->client_ID,
        'first_name' => $client->first_name,
        'last_name' => $client->last_name,
        'email' => $client->email,
        'date_of_birth' => $client->date_of_birth,
        'user_login' => $client->user_login,
        'user_password' => $client->user_password,
        'create_date' => $client->create_date,
        'privileges' => $client->privileges
    );

    // Make JSON
    print_r(json_encode($clients_arr));

