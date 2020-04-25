<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
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

    // Set worker_ID to update
    $worker->worker_ID = $data->worker_ID;
   

    // Delete worker
    if($worker->delete()) {
        echo json_encode(
            array('message' => 'Worker ' . $data->worker_ID . ' Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Worker Not Deleted')
        );
    }
