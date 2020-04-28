<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
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

   
    $worker->first_name = $data->first_name;
    $worker->last_name = $data->last_name;
    $worker->age = $data->age;
    $worker->nationality = $data->nationality;
    $worker->mail = $data->mail;
    $worker->is_journalist = $data->is_journalist;
    $worker->is_executive = $data->is_executive;
    $worker->is_staff = $data->is_staff;
    $worker->worker_login = $data->worker_login;
    $worker->worker_password = $data->worker_password;
    $worker->worker_date_of_birth = $data->worker_date_of_birth;
    $worker->worker_img_path = $data->worker_img_path;

    // Create worker
    if($worker->create()) {
        echo json_encode(
            array('message' => 'Worker Created')
        );
    } else {
        echo json_encode(
            array('message' => 'Worker NOT Created')
        );
    }
