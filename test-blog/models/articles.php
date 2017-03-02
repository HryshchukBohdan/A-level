<?php
function articles_all($link, $t_s){

    if ($t_s == "true") {
    $query = "select 
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
    } else {

     $query = "select 
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
                        post.post_id" ;
    }

    $result = mysqli_query($link, $query);
           
    if (!$result)
        die(mysqli_error($link));
    
    $n_rows = mysqli_num_rows($result);
    
    $articles = array();
    
    for ($i=0; $i < $n_rows; $i++) {

        $row = mysqli_fetch_assoc($result);
        
        $tag_name = explode(",", $row[tag_name]);
        $tag_id = explode(",", $row[tag_id]);
        $tag_id_name = array_combine($tag_id, $tag_name);

        $row[tag_id_name] = $tag_id_name;
        
        $articles[] = $row;
    }
    
    return $articles;
}

function articles_get($link, $post_id) {

    $query = sprintf("select 
                        post.post_id,
                        post.post_title,
                        post.post_text,
                        post.post_create_datetime,
                        tag.tag_title,
                        tag.tag_title,
                        count(post.post_id) as tag_n,
                        group_concat(tag.tag_title) as tag_name,
                        group_concat(tag.tag_id) as tag_id      
                    from
                        post
                        left join post_to_tag on (post.post_id=post_to_tag.post_id)
                            left join tag on (post_to_tag.tag_id=tag.tag_id)
                    where
                        post.post_id=%d
                    group by
                        post.post_id desc",(int)$post_id) ;
    
    $result = mysqli_query($link, $query);
    
    if (!$result)
        die(mysqli_error($link));
    
    
    $article = mysqli_fetch_assoc($result);
        
        $tag_name = explode(",", $article[tag_name]);
        $tag_id = explode(",", $article[tag_id]);
        $tag_id_name = array_combine($tag_id, $tag_name);
        $article[tag_id_name] = $tag_id_name;
     
    return $article;
}

function articles_tag($link, $tag_id){

    $query = sprintf("select 
                            post.post_id,
                            tag.tag_title
                    from
                        tag
                        left join post_to_tag on (tag.tag_id=post_to_tag.tag_id)
                            left join post on (post_to_tag.post_id=post.post_id)
                    where
                        tag.tag_id=%d",(int)$tag_id) ;
    
    $result = mysqli_query($link, $query);
    
    if (!$result)
        die(mysqli_error($link));
        
        $n_rows = mysqli_num_rows($result);
    
    $articles = array();
    
    for ($i=0; $i < $n_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $article[] = $row;
    }
    return $article;
}

function articles_com($link, $id){

    $query = sprintf("select 
                            comment.comment_id,
                            comment.comment_parent_id,
                            comment.comment_text,
                            comment.comment_datetime 
                    from 
                        comment
                    where
                        post_id=%d
                    group by
                        comment_id",(int)$id);

    $result = mysqli_query($link, $query);
           
    if (!$result)
        die(mysqli_error($link));
    
    $n_rows = mysqli_num_rows($result);
    
    $com_per = array();
    
    for ($i=0; $i < $n_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $com_per[$row[comment_id]] = $row;
    }
        
    return $com_per;
}

function com_print($com_pr, $perens, $text_indent) {

    foreach ($com_pr as $com) {
 
        if ($com[comment_parent_id] == $perens) {

    echo("<div class='coment'>");                      
            echo('<p style="text-indent:'. $text_indent .'em">');
            echo($com[comment_text]. " ");
            echo($com[comment_datetime]);
            echo("<p>");
     echo("</div>"); 
            echo(com_print($com_pr, $com[comment_id], $text_indent+2));
        }           
    }   
}

function articles_new($link, $post_title, $post_text, $tag_name) {
    
    $post_title = trim($post_title);
    $post_text = trim($post_text);
    
    if ($post_title == "") {
        return false;
    }
    
    $post = "insert into post (post_title, post_text, post_create_datetime) value ('%s', '%s', now())";
        
    $query_p = sprintf($post, mysqli_real_escape_string($link, $post_title), mysqli_real_escape_string($link, $post_text));
    $result_p = mysqli_query($link, $query_p);
    
    if (!$result_p)
        die(mysqli_error($link));
    
    $qwery_t = "select * from tag";
    $result_t = mysqli_query($link, $qwery_t);
    
    if (!$result_p)
        die(mysqli_error($link));
    
    $n_rows = mysqli_num_rows($result_t);    
    $articles = array();
    
    for ($i=0; $i < $n_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result_t);
        
        //$tag_name = explode(",", $row[tag_name]);
        //$tag_id = explode(",", $row[tag_id]);
        //$tag_id_name = array_combine($tag_id, $tag_name);

        //$row[tag_id_name] = $tag_id_name;
        
        $tags[] = $row;
    }
    
    $tag_name_prihod = explode(",", $tag_name);
    array_map(trim, $tag_name_prihod);
    print_r($tag_name);
    print_r($tag_name_prihod);
    print_r($tags);







$query = "select 
                post_id,
          from
                post
          limit 1" ;
    } else {
     $query = "select 
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
                        post.post_id" ;
        
    }
    $result = mysqli_query($link, $query);
           
    if (!$result)
        die(mysqli_error($link));
    
    $n_rows = mysqli_num_rows($result);
    
    $articles = array();
    
    for ($i=0; $i < $n_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        
        $tag_name = explode(",", $row[tag_name]);
        $tag_id = explode(",", $row[tag_id]);
        $tag_id_name = array_combine($tag_id, $tag_name);

        $row[tag_id_name] = $tag_id_name;
        
        $articles[] = $row;
    }











    foreach ($tags as $tag) {
        //echo $tag;
        foreach ($tag_name_prihod as $tag_n) {
            //echo $tag_n;
            if ($tag['tag_title'] == $tag_n) {
                echo $tag['tag_id'];
            } else echo "------" . '/n';
        }
    }
    
    return true;    
}

function articles_edit($id, $title, $date, $content){
    
}

function articles_delete($id){
    
}



?>