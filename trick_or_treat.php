<?php
// Set the content type to JSON for the leaderboard retrieval request
if (isset($_GET['getResults'])) {
    header('Content-Type: application/json');
}

// FIX: Correctly include the functions file.
require_once 'includes/functions.php';

// --- POST Request (Handle New Trick-or-Treat Game) ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!isset($_POST["name"]) || empty(trim($_POST["name"]))) {
        echo "<p>Please enter your name!</p>";
        exit;
    }

    $name = htmlspecialchars(trim($_POST["name"]));

    // The function call that caused the original fatal error
    $result = get_trick_or_treat();
    save_result($name, $result);

    // This output is captured by script.js and placed in the resultDiv
    echo "<div class='result-message'>
              <p>🎃 Happy Halloween, <strong>$name</strong>! $result</p>
          </div>";

} 
// --- GET Request (Load Leaderboard via AJAX) ---
else if (isset($_GET['getResults'])) {
    $leaderboard = get_recent_results(5);
    
    // Convert the plain text entries into an array of objects for JavaScript
    $data_for_json = [];
    foreach ($leaderboard as $entry) {
        // Example entry: 2025-10-31 11:44:31 - John: 🎁 You got a treat! Candy Corn 🍬
        $parts = explode(' - ', $entry, 2); 
        if (count($parts) > 1) {
            $name_result = explode(': ', $parts[1], 2);
            if (count($name_result) > 1) {
                $data_for_json[] = [
                    'name' => trim($name_result[0]),
                    'result' => trim($name_result[1]),
                ];
            }
        }
    }

    // Output the data as JSON
    echo json_encode($data_for_json);

} else {
    // For direct browser access
    echo "<p>Invalid request type.</p>";
}
?>