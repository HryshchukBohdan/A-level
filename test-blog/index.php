<?php
    require_once("db.php");
    require_once("models/articles.php");

    $articles = articles_all();
    print_r($articles);




 
    
print_r($arr);


    include("views/articles.php");
?>