<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <p> <p>dvsgdgs</p> 
            <h1> Названия блога</h1></p>
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
                    <?=com_print($com_pr, 0); ?>
                   
                    
                    
                    
                    
                    
                    <em><?=$article['teg_title']?></em>
                </div>
            </div>
            <footer>
                <p> подвальчик </p>
            </footer>
            
            
        </div>
    </body>
</html>