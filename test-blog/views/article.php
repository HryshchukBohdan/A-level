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
                    <em><?=$article['teg_title']?></em>
                </div>
            </div>
            <footer>
                <p> подвальчик </p>
            </footer>
            
            
        </div>
    </body>
</html>