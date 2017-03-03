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
                <form action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" method="POST">
					<p><input value="<?=$article[post_title]?>" name="post_title" class="form-control" placeholder="Название записи"></p>

					<p><textarea name="post_text" placeholder="Краткое содержание статьи" class="form-control name=" id="" cols="30" rows="10"><?=$article[post_text]?></textarea></p>
                    <p><input name="tag_text_all" class="form-control" placeholder="Теги через запятую" value="<?=$article[tag_name]?>"></p>
					
					<p><input type="submit" class="btn btn-danger btn-block" value="Сохранить"></p>
				</form>
        </div>
        <footer>
            <p> подвальчик </p>
        </footer>
    </body>
</html>