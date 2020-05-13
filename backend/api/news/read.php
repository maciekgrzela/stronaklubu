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

    // News query
    $result = $news->read();

    // Get row count
    $num = $result->rowCount();

    // Check if any news
    if($num > 0) {
        // News array
        $news_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $news_item = array(
                'news_ID' => $news_ID,
                'title' => $title,
                'content_path' => $content_path,
                'news_img_path' => $news_img_path,
                'tags' => $tags,
                'created_at' => $created_at,
                'last_commented' => $last_commented,
                'viewers' => $viewers,
                'worker_ID' => $worker_ID
            );


            // Push to "data"
            array_push($news_arr, $news_item);

        }

        // Turn to JSON & output
        echo json_encode($news_arr);

    } else {
        // No news
        echo json_encode(
            array('message' => 'No News found')
        );
    }

