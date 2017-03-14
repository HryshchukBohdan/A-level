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
    
    $article = array();
    
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
        $com_per[$row['comment_id']] = $row;
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
    
    if (!$result_t)
        die(mysqli_error($link));
    
    $n_rows = mysqli_num_rows($result_t);    
       
    for ($i=0; $i < $n_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result_t);     
        $tags[] = $row;
    }
    
    $tag_name_prihod = explode(",", $tag_name);
    $tag_name_prihod = array_map(trim, $tag_name_prihod);

    $query_id_p = "SELECT 
                        MAX(post_id) 
                    FROM post" ;

    $result_id = mysqli_query($link, $query_id_p);
           
    if (!$result_id)
        die(mysqli_error($link));

    $post_id = mysqli_fetch_assoc($result_id);
    $post_id = $post_id['MAX(post_id)'];

    foreach ($tags as $tag) {
        foreach ($tag_name_prihod as $tag_n) {
            if ($tag['tag_title'] == $tag_n) {
                $query_in = "INSERT INTO 
                                    post_to_tag (post_id, tag_id) 
                            VALUES 
                                    (" . $post_id . ", " . $tag['tag_id'] . ")" ;

                mysqli_query($link, $query_in);
            }
        }
    }

    foreach ($tags as $tag) {
        $tags_new[] = $tag['tag_title'];
    }

    $tags_new_diff = array_diff($tag_name_prihod, $tags_new);

    $i = null;
    foreach ($tags_new_diff as $tag) {
        $query_in = "INSERT INTO 
                            tag (tag_title) 
                    VALUES 
                            ('" . $tag  . "')" ;

        mysqli_query($link, $query_in);
        $i++;
    }

    $query_li = "SELECT 
                    tag_id 
                FROM 
                    tag 
                ORDER BY 
                    tag_id DESC 
                LIMIT " . $i ;

    $result_li = mysqli_query($link, $query_li);
          
    if (!$result_li)
        die(mysqli_error($link));

    $n_rows = mysqli_num_rows($result_li);
    $tag_id_to_post = array();
    
    for ($i=0; $i < $n_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result_li);
        $tag_id_to_post[] = $row['tag_id'];
    }

    $query_in = "INSERT INTO 
                        post_to_tag (post_id, tag_id) 
                VALUES 
                        (" ;

    foreach ($tag_id_to_post as $value) {
        $query_in .= $post_id . ", " . $value . "), (";
    
    }

    $query_in = substr($query_in, 0, -3);
    mysqli_query($link, $query_in);
    
    return true;    
}

function articles_edit($link, $id, $post_title, $post_text, $tag_text_all) {

    $post_title = trim($post_title);
    $post_text = trim($post_text);
    
    if ($post_title == "") {
        return false;
    }
    
    $post = "UPDATE post SET post_title = '%s', post_text = '%s', post_create_datetime = now() WHERE post_id = '%d'";

    $query_p = sprintf($post, mysqli_real_escape_string($link, $post_title), mysqli_real_escape_string($link, $post_text), mysqli_real_escape_string($link, $id));
    $result_p = mysqli_query($link, $query_p);
        
    if (!$result_p)
        die(mysqli_error($link));

    $qwery_t = "select * from tag";
    $result_t = mysqli_query($link, $qwery_t);

    if (!$result_t)
        die(mysqli_error($link));

    $n_rows = mysqli_num_rows($result_t);

    for ($i=0; $i < $n_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result_t);
        $tags[] = $row;
    }

    $qwery_t_po_id = "select tag.tag_id, tag.tag_title from tag left join post_to_tag on (post_to_tag.tag_id=tag.tag_id) WHERE post_to_tag.post_id = '$id'";
    $result_t_po_id = mysqli_query($link, $qwery_t_po_id);

    if (!$result_t_po_id)
        die(mysqli_error($link));

    $n_rows_id = mysqli_num_rows($result_t_po_id);

    $tags_po_id = array();

    for ($i=0; $i < $n_rows_id; $i++)
    {
        $row = mysqli_fetch_assoc($result_t_po_id);
        $tags_po_id[] = $row;
    }

    $tag_name_prihod = explode(",", $tag_text_all);
    $tag_name_prihod = array_map(trim, $tag_name_prihod);

    foreach ($tags_po_id as $tag) {
        foreach ($tag_name_prihod as $tag_n) {
            if ($tag['tag_title'] == $tag_n) {

                $tag_ob_del_id[] = $tag['tag_id'];
                $tag_new_del[] = $tag_n;

            } else {

                $tag_del[] = $tag['tag_id'];
                $tag_new[] = $tag_n;
            }
        }
    }

    $tag_del = array_diff(array_unique($tag_del), $tag_ob_del_id);
    $tag_new = array_diff(array_unique($tag_new), $tag_new_del);

    foreach ($tag_del as $del) {

        $query_pt = sprintf("delete from post_to_tag where post_id='%d' and tag_id='%d'", $id, $del);
        mysqli_query($link, $query_pt);
    }

    $i=0;

    foreach ($tag_new as $tag) {
        $query_in = "INSERT INTO 
                            tag (tag_title) 
                    VALUES 
                            ('" . $tag  . "')" ;

        mysqli_query($link, $query_in);
        $i++;
    }

    $query_li = "SELECT
                    tag_id 
                FROM 
                    tag 
                ORDER BY 
                    tag_id DESC 
                LIMIT " . $i ;

    $result_li = mysqli_query($link, $query_li);

    if (!$result_li)
        die(mysqli_error($link));

    $n_rows = mysqli_num_rows($result_li);
    $tag_id_to_post = array();

    for ($i=0; $i < $n_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result_li);
        $tag_id_to_post[] = $row['tag_id'];
    }

    $query_in = "INSERT INTO 
                        post_to_tag (post_id, tag_id) 
                VALUES 
                        (";

    foreach ($tag_id_to_post as $value) {
        $query_in .= $id . ", " . $value . "), (";

    }

    $query_in = substr($query_in, 0, -3);
    mysqli_query($link, $query_in);

    return true;
}

function articles_delete($link, $id) {

    $id = (int)$id;
    
    if ($id == 0) {
        return false;
    }

    $query = sprintf("delete from post where post_id='%d'", $id);
    $result = mysqli_query($link, $query);
        
    if (!$result)
        die(mysqli_error($link));

    $query_pt = sprintf("delete from post_to_tag where post_id='%d'", $id);
    $result = mysqli_query($link, $query_pt);
        
    if (!$result)
        die(mysqli_error($link));

    $qwery_t = "select tag.tag_id from tag left join post_to_tag on (post_to_tag.tag_id=tag.tag_id) WHERE post_to_tag.tag_id is null";
    $result_t = mysqli_query($link, $qwery_t);
    
    if (!$result_t)
        die(mysqli_error($link));
    
    $n_rows = mysqli_num_rows($result_t);    
     
    $tags = array();

    for ($i=0; $i < $n_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result_t);     
        $tags[] = $row['tag_id'];
    }

    foreach ($tags as $id) {

        $query = sprintf("delete from tag where tag_id='%d'", $id);
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
    }

return true;

}

function article_intro($text, $len = 250) {

    return mb_substr($text, 0, $len);
}