<?php

echo "How many pages of you diploma?\n";
$handle = fopen ("php://stdin","r");
$number = fgets($handle);

if ($number < 50) {
    echo "Hurry lazy ass!!";
} elseif (($number > 120) && ($number <= 180)) {
    echo "Vasche krasava";
} elseif (($number > 180) && ($number <=250)) {
    echo "Many, may cut off a piece of the engine?"; 
} elseif ($number > 250) {
    echo "Water flows from your diploma!!";     
} else echo "I see efforts";

echo "\n";
if ($number <= 10) echo "----* vzhih-vzhih and you expelled\n";
$handle1 = fopen ("php://stdin","r");
$number = fgets($handle1);
?>