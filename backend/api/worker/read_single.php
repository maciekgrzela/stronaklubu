<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Worker.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate player object
    $worker = new Worker($db);

    // Get ID
    $worker->worker_ID = isset($_GET['worker_ID']) ? $_GET['worker_ID'] : die();

    // Get player
    $worker->read_single();

    // Create array
    $worker_arr = array(
        'worker_ID' => $worker_ID,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'age' => $age,
        'nationality' => $nationality,
        'mail' => $mail,
        'is_journalist' => $is_journalist,
        'is_executive' => $is_executive,
        'is_staff' => $is_staff,
        'worker_login' => $worker_login,
        'worker_password' => $worker_password,
        'worker_date_of_birth' => $worker_date_of_birth,
        'worker_img_path' => $worker_img_path,
        'create_date' => $create_date
    );

    // Make JSON
    print_r(json_encode($worker_arr));

