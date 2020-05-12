<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Narrative.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate club object
$narrative = new Narrative($db);

// Get ID
$narrative->narrative_ID = isset($_GET['narrative_ID']) ? $_GET['narrative_ID'] : die();

// Get club
$narrative->read_single();

// Create array
$narrative_arr = array(
    'narrative_ID' => $narrative->narrative_ID,
    'match_ID' => $narrative->match_ID,
    'title' => $narrative->title,
    'date' => $narrative->date
);

// Make JSON
print_r(json_encode($narrative_arr));

?>