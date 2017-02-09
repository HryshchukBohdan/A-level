<?php
    require_once("db.php");
    require_once("models/articles.php");
    
    $link = db_connect();
    $article = articles_get($link, $_GET["id"]);

    include("views/article.php");
?>