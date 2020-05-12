<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Narrative.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate Club object
$narrative = new Narrative($db);

// Get raw posted data
// $data = json_decode(file_get_contents("php://input"));

$data = $_POST;

$narrative->match_ID = $data["match_ID"];
$narrative->title = $data["title"];
$narrative->date = $data["date"];

// Create narrative
if($narrative->create()) {
    echo json_encode(
        array('message' => 'club Created')
    );
} else {
    echo json_encode(
        array('message' => 'club NOT Created')
    );
}
