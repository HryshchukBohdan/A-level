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
            header("Location: index.php");
        }

        include("../views/article_ad.php");

    } else if($action == "edit") {

        if(!isset($_GET['id'])) {

            header("Location: index.php");
        }
            $id = (int)$_GET['id'];

            if(!empty($_POST) && $id > 0) {
            articles_edit($link, $id, $_POST["post_title"], $_POST["post_text"], $_POST["tag_text_all"]);
            header("Location: index.php");
        }

        $article = articles_get($link, $id);
        include("../views/article_ad.php");

    } else if($action == "del") {

        $id = (int)$_GET['id'];
        articles_delete($link, $id);
        header("Location: index.php");

    } else {

        $articles = articles_all($link, $_POST["sub"]);
        include("../views/articles_ad.php");
    } 
?>