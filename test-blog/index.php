<?php

    require_once("db.php");
    require_once("models/articles.php");
    
    $link = db_connect();
    $articles = articles_all($link, $_POST["sub"]);
   
    include("views/articles.php");