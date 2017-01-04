<?php
echo "      Belarusian test\n"; 
echo "If you love potatoes, press 1!\n";

$handle = fopen ("php://stdin","r");
$input = fgets($handle);

echo ($input == 1) ? "BATKO proud of you" : "How can you not love potatoes?"; 
echo "\n";

?>