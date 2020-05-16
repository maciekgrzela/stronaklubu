<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Ticket.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate news object
$tickets = new Ticket($db);

//$tickets->client_ID = isset($_GET['client_ID']) ? $_GET['client_ID'] : die();

// News query
$result = $tickets->read_specific($_GET['client_ID']);

// Get row count
$num = $result->rowCount();

// Check if any news
if($num > 0) {
    // News array
    $tickets_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $tickets_item = array(
        'ticket_ID' => $ticket_ID,
        'clubHome' => $clubHome,
        'clubAway' => $clubAway,
        'seat' => $seat,
        'match_date' => $match_date
        );


        // Push to "data"
        array_push($tickets_arr, $tickets_item);

    }

    // Turn to JSON & output
    echo json_encode($tickets_arr);

} else {
    // No news
    echo json_encode(
        array('message' => 'No News found')
    );
}

