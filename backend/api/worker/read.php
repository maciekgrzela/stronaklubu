<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Worker.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate worker object
    $worker = new Worker($db);

    // Worker query
    $result = $worker->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any worker
    if($num > 0) {
        // Worker array
        $workers_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $worker_item = array(
                'worker_ID' => $worker_ID,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'age' => $age,
                'nationality' => $nationality,
                'worker_role' => $worker_role,
                'worker_img_path' => $worker_img_path
                
            );


            // Push to "data"
            array_push($workers_arr, $worker_item);

        }

        // Turn to JSON & output
        echo json_encode($workers_arr);

    } else {
        // No workers
        echo json_encode(
            array('message' => 'No Workers found')
        );
    }

