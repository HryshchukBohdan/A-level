<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1> Названия блога</h1>
            <div>
                <?php foreach($articles as $artic): ?>
                <div class="article">                    
                   <h3><a href="article.php?id=<?= $artic[post_id]?>">
                        <?=$artic["post_title"]?></a></h3>
                    <p><?=$artic['post_text']?></p>
                    <em><?=$artic['post_create_datetime']?></em>
                    
                    
                    
                    <?php foreach($artic[tag_id_name] as $tag_id_name): ?>
                    <h3><a href="article.php?id=<?= $artic[post_id]?>">
                        <?=$tag_id_name?></a></h3>
                    
                    
                    
                    
                    <em>теги</em>
                    <?php endforeach ?>
                </div>
                <?php endforeach ?>
                
                <?php foreach($tages as $tag): ?>
                <div class="tag">                    
                   <h3><a href="tag.php?id=<?= $tag[tag_id]?>">
                        <?=$artic["tag_title"]?></a></h3>
                    <em>теги</em>
                </div>
                <?php endforeach ?>
                
                
                
            </div>
            <footer>
                <p> подвальчик </p>
            </footer>
            
            
        </div>
    </body>
</html>