<?php

echo "Enter three numbers, each on a new line, please\n";
$handle1 = fopen ("php://stdin","r");
$handle2 = fopen ("php://stdin","r");
$handle3 = fopen ("php://stdin","r");

$fizz = fgets($handle1);
$bizz = fgets($handle2);
$pizz = fgets($handle3);

echo "\n";

$x=0;
while (++$x<=($pizz)) {
    if ($x%$fizz==0) echo "F";
    if ($x%$bizz==0) echo "B";
    if (($x%$fizz) && ($x%$bizz)) echo "$x";   

echo " ";
    
}

echo "\n";
?>