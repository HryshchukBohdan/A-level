<?php

    require_once("db.php");
    
    $link = db_connect();
    $query = "SELECT * FROM map ORDER BY id DESC" ;

    $arr = mysqli_query($link, $query);

    if ($_REQUEST) {

        $query = "INSERT INTO map (name, lat, lng) VALUES ('$_REQUEST[name]', '$_REQUEST[lat]', '$_REQUEST[lng]')" ;
        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));
    }

    include("map.php");