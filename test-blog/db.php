<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=blog', bohdan0516, '0516');
    foreach($dbh->query('SELECT * from post') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

    echo (db);
?>