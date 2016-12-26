<?php

$fr[4]=1;
$fr[8]=2;
sort($fr);
foreach ($fr as $key => $val) {
    echo "[" . $key . "] = " . $val . "\n";
}

?>