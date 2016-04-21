<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>Мой первый блог</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Мой первый блог</h1>
        <a href="Admin">Панель администратора</a>
        <div>
            <?php foreach($articles as $a): ?>
            <div class="article">
                <h3><a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
                <em>Опубликовано: <?=$a['date']?></em>
                <p><?=$a['content']?></p>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <footer>
        <p>Мой первый блог <br>Copyright © 2015</p>
    </footer>    
</body>
    
</html>