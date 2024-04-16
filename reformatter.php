<?php

function format_xml($input) {
    // Split the input string into an array of lines based on '<' and '>'
    $lines = explode('<', str_replace('>', ">\n", $input));

    // Initialize variable to store the formatted XML
    $formatted_xml = '';
    $space = 0;

    // Iterate over each line
    foreach ($lines as $line) {
        // Skip empty lines
        if (trim($line) === '') {
            continue;
        }

        // Add indentation before the current line based on the space level
        $formatted_xml .= str_repeat('  ', $space) . '<' . $line . "\n";

        // Increase space level when opening a tag
        if (strpos($line, '/') === false) {
            $space++;
        }

        // Decrease space level when closing a tag
        if (strpos($line, '/') === 0) {
            $space--;
        }
    }

    // Remove the last indentation
    $formatted_xml = rtrim($formatted_xml);

    return $formatted_xml;
}

// Prompt for input XML or HTML
echo "Enter XML or HTML:\n";

// Read user input from the console
$input = '';

// Read input line by line until an empty line is entered
while (($line = trim(fgets(STDIN))) !== '') {
    $input .= $line;
}

// Format XML
$formatted_xml = format_xml($input);

// Output the formatted XML
echo $formatted_xml;
?>
