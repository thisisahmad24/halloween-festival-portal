<?php
function get_trick_or_treat() {
    $treats = [
        "Candy Corn 🍬",
        "Chocolate Bar 🍫",
        "Lollipop 🍭",
        "Pumpkin Pie 🥧",
        "Gummy Worms 🪱"
    ];

    $tricks = [
        "Your shoelaces are tied together! 👟",
        "You hear a ghostly whisper 👻",
        "A spider jumps out (toy)! 🕷️",
        "Your flashlight flickers mysteriously 💡",
        "A skeleton waves at you 💀"
    ];

    // 70% chance for treat, 30% for trick
    if (rand(1, 10) <= 7) {
        $index = array_rand($treats);
        return "🎁 You got a treat! " . $treats[$index];
    } else {
        $index = array_rand($tricks);
        return "👻 Oh no! It's a trick! " . $tricks[$index];
    }
}

function save_result($name, $result) {
    // Defines the data directory as 'data' one level up from 'includes'
    $data_dir = __DIR__ . '/../data'; 
    if (!file_exists($data_dir)) {
        // Create the data directory if it doesn't exist
        mkdir($data_dir, 0777, true); 
    }

    $file = $data_dir . '/results.txt';
    // Format the entry for easy parsing later
    $entry = date("Y-m-d H:i:s") . " - $name: $result" . PHP_EOL; 
    file_put_contents($file, $entry, FILE_APPEND);
}

function get_recent_results($limit = 5) {
    $file = __DIR__ . '/../data/results.txt';

    if (!file_exists($file)) {
        return [];
    }

    // Read the file, reverse the lines to show latest first
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $lines = array_reverse($lines); 
    
    // Return only the specified limit
    return array_slice($lines, 0, $limit); 
}
?>