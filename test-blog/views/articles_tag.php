<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <center><h1><?=$tag_title; ?></h1></center>             
            <a href="admin"> Панель редактирования</a>
            <div>
                <?php foreach($article as $artic): ?>
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
                </div>
                    <?php endforeach ?>              
            </div>
            <footer>
                <p> подвальчик </p>
            </footer>
        </div>
    </body>
</html>