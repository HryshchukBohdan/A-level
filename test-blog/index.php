<?php
    require_once("db.php");
    require_once("models/articles.php");
    
    $link = db_connect();
    $articles = articles_all($link);
    //$tages = tages_();
    print_r($articles);


    include("views/articles.php");
?>