<?php
// save_entry.php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['accountName'], $data['surveyName'], $data['fullName'], $data['surveyID'], $data['date'])) {
    // Prepare the new entry to be saved
    $newEntry = [
        "accountName" => $data['accountName'],
        "surveyName" => $data['surveyName'],
        "fullName" => $data['fullName'],
        "surveyID" => $data['surveyID'],
    ];

    // Define the filename based on the date
    $filename = 'entries/' . $data['date'] . '.json';

    // Check if the file already exists
    if (file_exists($filename)) {
        // Read existing entries
        $existingEntries = json_decode(file_get_contents($filename), true);
    } else {
        // Initialize the entries array if the file does not exist
        $existingEntries = [];
    }

    // Append the new entry to the existing entries
    $existingEntries[] = $newEntry;

    // Save the updated entries back to the file
    file_put_contents($filename, json_encode($existingEntries, JSON_PRETTY_PRINT));

    // Respond with a success message
    echo json_encode("Entry saved successfully!");
} else {
    // Respond with an error message
    echo json_encode("Invalid input data.");
}
?>
