<?php
    require_once("db.php");
    require_once("models/articles.php");
    
    $link = db_connect();
    $article = articles_get($link, $_GET["id"]);
    print_r($article);
    $com_pr = articles_com($link, $_GET["id"]);
    print_r($com_pr);


    include("views/article.php");
?>