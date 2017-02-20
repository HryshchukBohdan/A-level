<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="title"><h1> Названия блога</h1></div>
                 <div class="article"> 
                    <h3><?=$article['post_title']?></h3>
                    <p><?=$article['post_text']?></p>
                    <em><?=$article['post_create_datetime']?></em>   
                        <div>                               
                            <?php foreach($article[tag_id_name] as $id_tag => $tag_name): ?>
                                <em><a href="articles_tag.php?id_tag=<?= $id_tag?>">
                                    <?=$tag_name?></a> </em>
                                        <?php endforeach ?>
                        </div>
                        </div>
                            <?=com_print($com_pr, 0, 0); ?>   
                        </div>
        <footer>
            <p> подвальчик </p> 
        </footer>    
    </body>
</html>