<?php
function articles_all($link){
   // $query = "select * from post order by post_id desc" ;
   // $query = "select * from post order by post_id desc" ;
    $query_tag = "select 
                        post.post_id,
                        post.post_title,
                        post.post_text,
                        post.post_create_datetime,
                        tag.tag_title,
                        count(post.post_id) as tag_n,
                        group_concat(tag.tag_title) as tag_name,
                        group_concat(tag.tag_id) as tag_id
                        
                    from
                        post
                        left join post_to_tag on (post.post_id=post_to_tag.post_id)
                            left join tag on (post_to_tag.tag_id=tag.tag_id)
                    group by
                        post.post_id desc" ;
   // $result = mysqli_query($link, $query);
    $result = mysqli_query($link, $query_tag);
       
    if (!$result)
        die(mysqli_error($link));
    
    //$n_rows = mysqli_num_rows($result);
    $n_rows = mysqli_num_rows($result);
    
    $articles = array();
    
    for ($i=0; $i < $n_rows; $i++)
    {
       // $row = mysqli_fetch_assoc($result);
        $row = mysqli_fetch_assoc($result);
        
        $tag_name = explode(",", $row[tag_name]);
        $tag_id = explode(",", $row[tag_id]);
        $tag_id_name = 
        $tag_id_name = 
        
       // $row[tag_name] = $tag_name;
       // $row[tag_id] = $tag_id;
        $row[tag_id_name] = $tag_id_name;
        
        $articles[] = $row;
    }
    
    return $articles;
}

function articles_get($link, $post_id){
    $query = sprintf("select * from post where post_id=%d",(int)$post_id);
    $result = mysqli_query($link, $query);
    
    if (!$result)
        die(mysqli_error($link));
    
    $article = mysqli_fetch_assoc($result);
    
    return $article;
    
}

function articles_new($title, $date, $content){
    
}

function articles_edit($id, $title, $date, $content){
    
}

function articles_delete($id){
    
}



?>