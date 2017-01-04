<?php

echo "Give it to me!\n";
$handle = fopen ("php://stdin","r");
$number = fgets($handle);

switch (true) {
    case (($number<=10) || ($number==100)):
        echo "WHAAAAT?????"; 
        break;     
    case (($number>10) && ($number<100)):
        echo "OK :("; 
        break;   
    case ($number>1000):
        echo "Thanks, man!"; 
        break; 
    case ($number>100):
        echo "Thanks, man!"; 
        break;         
} echo "\n";
switch (true) {
    case ($number>1000):
        echo "\n!!!!WOOOOWWWW!!!\n"; 
        break; 
}

?>