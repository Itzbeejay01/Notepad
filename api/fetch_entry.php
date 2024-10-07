<?php
// fetch_entry.php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Get the date from the query parameter
$date = isset($_GET['date']) ? $_GET['date'] : null;

if ($date) {
    // Define the filename based on the date
    $filename = 'entries/' . $date . '.json';

    // Check if the file exists
    if (file_exists($filename)) {
        // Read the content of the file
        $entries = file_get_contents($filename);
        
        // Respond with the entries data
        echo $entries;
    } else {
        // Respond with an error message
        echo json_encode("No entry found for this date.");
    }
} else {
    // Respond with an error message
    echo json_encode("Invalid date.");
}
?>
