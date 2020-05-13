<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Achievement.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate achievement object
    $achievement = new Achievement($db);

    // News query
    $result = $achievement->read();

    // Get row count
    $num = $result->rowCount();

    // Check if any achievement
    if($num > 0) {
        // News array
        $achievement_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $achievement_item = array(
                'achievement_ID' => $achievement_ID,
                'achievement_year' => $achievement_year,
                'achievement_name' => $achievement_name
            );
            
            // Push to "data"
            array_push($achievement_arr, $achievement_item);

        }

        // Turn to JSON & output
        echo json_encode($achievement_arr);

    } else {
        // No news
        echo json_encode(
            array('message' => 'No Achievements found')
        );
    }

