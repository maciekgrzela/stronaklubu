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

// Get ID
$narrative->item_id = isset($_GET['item_id']) ? $_GET['item_id'] : die();

// Get club
$narrative->read_single();

// Create array
$narrative_arr = array(
    'item_id' => $narrative->item_id,
    'narrative_id' => $narrative->narrative_id,
    'author_id' => $narrative->author_id,
    'img_path' => $narrative->img_path,
    'text' => $narrative->text,
    'date' => $narrative->date
);

// Make JSON
print_r(json_encode($narrative_arr));
