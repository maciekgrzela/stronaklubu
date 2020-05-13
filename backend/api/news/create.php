<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/News.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate news object
    $news = new News($db);

    // Get raw posted data
    // $data = json_decode(file_get_contents("php://input"));
    
    $data = $_POST;
   
    $news->title = $data["title"];
    $news->content_path = $data["content_path"];
    $news->news_img_path = $data["news_img_path"];
    $news->tags = $data["tags"];
    $news->worker_ID = $data["worker_ID"];



    // Create news
    if($news->create()) {
        echo json_encode(
            array('message' => 'News Created')
        );
    } else {
        echo json_encode(
            array('message' => 'News NOT Created')
        );
    }
