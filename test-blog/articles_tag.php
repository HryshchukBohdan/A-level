<?php
    require_once("db.php");
    require_once("models/articles.php");
    
    $link = db_connect();
   // $article = articles_get($link, $_GET["id"]);
   // print_r($article);
   // $com_pr = articles_com($link, $_GET["id"]);
    //print_r($com_pr);
 $tag_v_id = articles_tag($link, $_GET["id_tag"]);
    print_r($tag_v_id);
foreach ($tag_v_id as $p_id) {
   $article[] = articles_get($link, $p_id[post_id]);
    $tag_title = $p_id[tag_title];
}


//print_r($article);
//print_r($tag_title);

    include("views/articles_tag.php");
?>