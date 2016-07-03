<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<ul>
    <li><a href="#">About</a></li>
    <?php foreach ($news as $article): ?>
        <li><?=$article['title']; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>