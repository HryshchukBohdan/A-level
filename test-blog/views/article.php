<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <h1> Названия блога</h1>
            <div>
                <div class="article">
                    <h3><?=$article['post_title']?></h3>
                    <p><?=$article['post_text']?></p>
                    <em><?=$article['post_create_datetime']?></em>
                    
                    
                    
                    <div>                                   
                        <?php foreach($article[tag_id_name] as $id_tag => $tag_name): ?>
                        <em><a href="article.php?id=<?= $id_tag?>">
                        <?=$tag_name?></a> </em>
                        <?php endforeach ?>
                    </div> 
                    
                    <div>                                   
                        <?php foreach($article[article_com] as $id => $com): ?>
                        <p><?=$com[comment_text]?> <?=$com[comment_datetime]?></p>
<?php do { require_once("db.php");
                        
    $link = db_connect();
    $com_per = articles_com($link, $id);
                        print_r($com_per);             
?>  
                    <div>                                   
                        <?php foreach($com_per as $id => $com): ?>
                        <p><?=$com[comment_text]?> <?=$com[comment_datetime]?></p>
                        <?php endforeach ?>
                    </div>   
                        <?php } while(empty($com_per)); ?>
                        
                        
                        
                        
                        
                        
                        <?php endforeach ?>
                    </div>                    
                    
                    
                    
                    
                    
                    <em><?=$article['teg_title']?></em>
                </div>
            </div>
            <footer>
                <p> подвальчик </p>
            </footer>
            
            
        </div>
    </body>
</html>