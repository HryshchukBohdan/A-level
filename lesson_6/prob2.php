<?php
//looping through file
(array_map(map2,file($argv[1])));

 function map1($rank, $a, $b) {    
    //defining exact multiplier for each rank   
        
        $multiplier = isset($result[$rank]) ? $result[$rank] : 1;
        while(($rank * ($multiplier + 1) * $b) < $a) {
            $multiplier++;
        }
        $result[$rank] = $multiplier;
        if($rank != 1) {
            $result[$rank * 0.1] = $multiplier * 10;
        }
      //  echo $b * ($result[1]+1) . "\n";
       return( $b * ($result[1]+1));
} 
 
function map2($value) {
 
    //creating or reseting variables
    $result = [];
    $rank = 1;
    $ranks = [$rank];
    
       //getting numbers to process
    list($a, $b) = array_map('intval', explode(',', $value));
    $a_array = [$a];
    $b_array = [$b];    
    //defining ranks used in final multiplier
    while($b * ($rank*10) < $a) {
        $rank *= 10;
        $ranks[] = $rank;
        $a_array[] = $a;
        $b_array[] = $b;
    }
    $ranks = array_reverse($ranks);
    
    echo end(array_map(map1,$ranks,$a_array,$b_array)) . "\n";
     
}   