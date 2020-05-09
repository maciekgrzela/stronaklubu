<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/NarrativeItem.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate club object
$narrative = new NarrativeItem($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set club_ID to update
$narrative->item_id = $data->item_id;

$narrative->narrative_id = $data->narrative_id;
$narrative->author_id = $data->author_id;
$narrative->img_path = $data->img_path;
$narrative->text = $data->text;
$narrative->date = $data->date;

// Create club
if($club->update()) {
    echo json_encode(
        array('message' => 'narrative item ' . $data->item_ID . ' Updated')
    );
} else {
    echo json_encode(
        array('message' => 'narrative item Not Updated')
    );
}
