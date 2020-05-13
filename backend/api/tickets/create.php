<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Ticket.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate player object
$ticket = new Ticket($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$ticket->client_ID = $data->client_ID;
$ticket->seat = $data->seat;
$ticket->match_ID = $data->match_ID;

// Create ticket
if($ticket->create()) {
    echo json_encode(
        array('message' => 'Ticket Created')
    );
} else {
    echo json_encode(
        array('message' => 'Ticket Not Created')
    );
}
