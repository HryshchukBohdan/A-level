<?php
    require_once("../db.php");
    require_once("../models/articles.php");
    
    $link = db_connect();

    if(isset($_GET["action"])) {
        $action = $_GET["action"];
       

    } else {
        $action = "";
    }
    



    if($action == "add") {
        if(!empty($_POST)) {
            articles_new($link, $_POST["post_title"], $_POST["post_text"], $_POST["tag_text_all"]);
            //print_r($_POST["tag_text_all"]);
            header("Location: index.php");
            
        }
        //print_r($action);
        include("../views/article_ad.php");
    } else {
        $articles = articles_all($link, $_POST["sub"]);
        include("../views/articles_ad.php");
    }  
?>