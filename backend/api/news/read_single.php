<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/News.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate news object
    $news = new News($db);

    // Get ID
    $news->news_ID = isset($_GET['news_ID']) ? $_GET['news_ID'] : die();

    // Get news
    $news->read_single();

    // Create array
    $news_arr = array(
        'news_ID' => $news->news_ID,
        'title' => $news->title,
        'content_path' => $news->content_path,
        'news_img_path' => $news->news_img_path,
        'tags' => $news->tags,
        'created_at' => $news->created_at,
        'last_commented' => $news->last_commented,
        'viewers' => $news->viewers,
        'worker_ID' => $news->worker_ID
    );

    // Make JSON
    print_r(json_encode($news_arr));

