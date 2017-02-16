<?php
    require_once("db.php");
    require_once("models/articles.php");
    
    $link = db_connect();
    $tag_v_id = articles_tag($link, $_GET["id_tag"],);
   
    foreach ($tag_v_id as $p_id) {
        $article[] = articles_get($link, $p_id[post_id]);
        $tag_title = $p_id[tag_title];
    }

    include("views/articles_tag.php");
?>