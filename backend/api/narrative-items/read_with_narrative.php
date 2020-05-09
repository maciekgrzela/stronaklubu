<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/NarrativeItem.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate club object
$narrative = new NarrativeItem($db);

// club query
$result = $narrative->read_with_narrative($_GET['narrative_id']);
// Get row count
$num = $result->rowCount();

// Check if any club
if($num > 0) {
    // club array
    $narratives_arr = array();
    //$clubs_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $narrative_item = array(
            'item_id' => $item_id,
            'narrative_id' => $narrative_id,
            'author_id' => $author_id,
            'author_first_name' => $first_name,
            'author_last_name' => $last_name,
            'img_path' => $img_path,
            'text' => $text,
            'date' => $date
        );


        // Push to "data"
        array_push($narratives_arr, $narrative_item);
        // array_push($clubs_arr['data'], $club_item);

    }

    // Turn to JSON & output
    echo json_encode($narratives_arr);

} else {
    // No clubs
    echo json_encode(
        array('message' => 'No narrative items found')
    );
}

