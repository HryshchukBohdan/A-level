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
        <div>
    <form action="" method="post" class="admin">
        <button class="new" type="submit" name="sub" value="true">Туда</button>
        <button class="new" type="submit" name="sub" value="false">Сюда</button>
    </form>
        </div>      
            <div>
                <?php foreach($articles as $artic): ?>
                <div class="article">                    
                   <h3><a href="article.php?id=<?= $artic[post_id]?>">
                        <?=$artic["post_title"]?></a></h3>
                    <p><?=$artic['post_text']?></p>
                    <em><?=$artic['post_create_datetime']?></em>
                    
                    <div>                                   
                        <?php foreach($artic[tag_id_name] as $id_tag => $tag_name): ?>
                        <em><a href="articles_tag.php?id_tag=<?= $id_tag?>">
                        <?=$tag_name?></a> </em>
                        <?php endforeach ?>
                    </div> 
                    
                        <em><?=$article['teg_title']?></em>
                </div>
                <?php endforeach ?>              
            </div>
            <footer>
                <p> подвальчик </p>
            </footer>
        </div>
    </body>
</html>