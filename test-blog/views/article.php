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
                    <h3><?=$article['title']?></h3>
                    <p><?=$article['content']?></p>
                    <em><?=$article['date']?></em>
                    <em>теги</em>
                </div>
            </div>
            <footer>
                <p> подвальчик </p>
            </footer>
            
            
        </div>
    </body>
</html>