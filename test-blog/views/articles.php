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
                   <h3><a href="article.php?id=<?= $artic[id]?>">
                        <?=$artic[title]?></a></h3>
                    <p><?=$artic['content']?></p>
                    <em><?=$artic['date']?></em>
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