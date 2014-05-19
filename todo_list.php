<?php

// Create array to hold list of todo items
$items = [];

// List array items formatted for CLI
function list_items($list)
{
    // Return string of list items separated by newlines.
    // Should be listed [KEY] Value like this:
    // [1] TODO item 1
    // [2] TODO item 2 - blah
    // DO NOT USE ECHO, USE RETURN

    $result = '';
    // loop through the list
    // foreach or for
     foreach ($list as $key => $value)
     {
        $result .= '[' . ($key + 1) . '] ' . $value . PHP_EOL;
     }

     return $result;
}

// echo list_items($items);
// $result .= $key . PHP_EOL;
// Get STDIN, strip whitespace and newlines, 
// and convert to uppercase if $upper is true
function get_input($upper = false) 
{
    $result = trim(fgets(STDIN));
    return $upper ? strtoupper($result): $result;   
}

function sort_menu($itmes){
    echo '(A)-Z, (O)rder entered, (R)everse order entered : ';

    $input = get_input(TRUE);
}

// The loop!
do {
    // Echo the list produced by the function
    echo list_items($items);

    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ort (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);

    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = get_input();
    asort($items); // sorts the input items entered 
    } 

    elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = get_input();
        // Remove from array
        unset($items[$key - 1]);
        $items = array_values($items);
    asort($items); // resorts input items if 1 item is removed 
    }

    elseif ($input == 'S') {
        echo '(A)-Z, (Z)-A, (O)rder Enter, (R)everse order entered : ';
        
        $input = get_input(true);



        return($items);    

    }
        

// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);
