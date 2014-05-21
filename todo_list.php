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
     // TODO item 1
     // TODO item 2
     // and so on
     // retunr the results to computer, DO NOT ECHO
     return $result;
}
// open file through path given by user 

function open_file()
{
    $filename = get_input();
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    $items = explode("\n", $contents);
    return $items;
}
// echo list_items($items);

function get_input($upper = false) 
{
    $result = trim(fgets(STDIN));
    return $upper ? strtoupper($result): $result;   
}


// The loop!
do {
    // Echo the list produced by the function
    echo list_items($items);

    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ort, (O)pen, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);

    // Check for actionable input
    if ($input == 'N') {
            // Ask for entry
        echo 'Enter item: ';
            // Add entry to list array
        $todo_item = get_input();
            // ask user where they want entry added 
        echo 'Do you want the entry added to the (B)eginning or (E)nd of your list? ';
                // get input from the user
         $order_choice = get_input(TRUE);
                
             if ($order_choice == 'B') {
                    array_unshift($items, $todo_item);
                // add to end end of list
                } 
                else if ($order_choice == 'E') {
                    array_push($items, $todo_item);
                } 
                else {
                    array_push($items, $todo_item);
                }
    }        
    elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = get_input();
        // Remove from array
        unset($items[$key - 1]);
        $items = array_values($items);
    }

    elseif ($input == 'S') {
        // Remove which item?
        // echo 'Enter item number to remove: 
        echo 'How do you want it sorted: (A)-Z, (Z)-A, (O)rder entered, (R)everse order entered"? ';
        // Get array key
        $sort_input = get_input(TRUE);
            //Sort alphabetically
            if ($sort_input == 'A') {
                sort($items);
            //Sort reverse alphabetically
            } 
            elseif ($sort_input == 'Z')  {
                rsort($items);
            }
            elseif ($sort_input == 'O') {
                 asort($items);  
            }
            elseif ($sort_input == 'R') {
                 arsort($items);  
            }   
    } 

    elseif ($input == 'O') {
        //Create a sub-menu with file and save option
        echo 'Please enter file path to open: ';
            //Get input from user
                $items = open_file();
    }

    elseif($input == 'F') {
        //Verify key input with user
        echo 'Are you sure you want to remove first item? (Y)es or (N)o ';
        //Get input from user
        $remove_first = get_input(TRUE);
            //Remove item
            if ($remove_first == 'Y') {
                array_shift($items);
            }
    
    
    } 
    //Allow user to remove items from the end of the list
    elseif ($input == 'L') {
        //Verify key input with user
        echo 'Are you sure you want to remove last item? (Y) or (N) ';
        //Get input from user
        $remove_last = get_input(TRUE);
            //Remove item
            if ($remove_last == 'Y') {
                array_pop($items);
            }
        }

}
   
    
    // return($items);            

// Exit when input is (Q)uit
while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);




