<?php
function fetch_all_assoc(& $result,$index_keys) {

  // Args :    $result = mysqli result variable (passed as reference to allow a free() at the end
  //           $indexkeys = array of columns to index on
  // Returns : associative array indexed by the keys array

  $assoc = array();             // The array we're going to be returning

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $pointer = & $assoc;            // Start the pointer off at the base of the array

        for ($i=0; $i<count($index_keys); $i++) {
        
                $key_name = $index_keys[$i];
                if (!isset($row[$key_name])) {
                        print "Error: Key $key_name is not present in the results output.\n";
                        return(false);
                }

                $key_val= isset($row[$key_name]) ? $row[$key_name]  : "";
        
                if (!isset($pointer[$key_val])) {               

                        $pointer[$key_val] = "";                // Start a new node
                        $pointer = & $pointer[$key_val];                // Move the pointer on to the new node
                }
                else {
                        $pointer = & $pointer[$key_val];            // Already exists, move the pointer on to the new node
                }

        } // for $i

        // At this point, $pointer should be at the furthest point on the tree of keys
        // Now we can go through all the columns and place their values on the tree
        // For ease of use, include the index keys and their values at this point too

        foreach ($row as $key => $val) {
                        $pointer[$key] = $val;
        }

  } // $row

  /* free result set */
  $result->close();

  return($assoc);               
}
?>