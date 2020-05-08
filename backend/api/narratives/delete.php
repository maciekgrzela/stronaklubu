<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
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

// Set club_ID to delete
$narrative->narrative_ID = $data->narrative_ID;

// Delete club
if($narrative->delete()) {
    echo json_encode(
        array('message' => 'narrative ' . $data->narrative_ID . ' Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'narrative Not Deleted')
    );
}
