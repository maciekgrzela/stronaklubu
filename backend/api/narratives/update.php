<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Narrative.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate club object
$narrative = new Narrative($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set club_ID to update
$narrative->narrative_ID = $data->narrative_ID;

$narrative->match_ID = $data->match_ID;
$narrative->title = $data->title;
$narrative->date = $data->date;

// Create club
if($club->update()) {
    echo json_encode(
        array('message' => 'narrative ' . $data->narrative_ID . ' Updated')
    );
} else {
    echo json_encode(
        array('message' => 'narrative Not Updated')
    );
}
