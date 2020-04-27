<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type,
     Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/News.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate news object
    $news = new News($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // Set news_ID to update
    $news->news_ID = $data->news_ID;
   

    // Delete news
    if($news->delete()) {
        echo json_encode(
            array('message' => 'News ' . $data->news_ID . ' Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'News Not Deleted')
        );
    }
