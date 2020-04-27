<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type,
     Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Worker.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate worker object
    $worker = new Worker($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // Set worker ID to update
    $worker->worker_ID = $data->worker_ID;
   
    $worker->first_name = $data->first_name;
    $worker->last_name = $data->last_name;
    $worker->age = $data->age;
    $worker->nationality = $data->nationality;
    $worker->worker_role = $data->worker_role;
    $worker->worker_img_path = $data->worker_img_path;
   

    // Create worker
    if($worker->update()) {
        echo json_encode(
            array('message' => 'Worker Created')
        );
    } else {
        echo json_encode(
            array('message' => 'Worker NOT Created')
        );
    }
