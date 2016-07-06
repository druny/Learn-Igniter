<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="header clearfix">
    <div class="container">
        <ul class="menu">
            <li><a href="/news">Новостная лента</a></li>
            <li><a href="/news/add">Добавление новостей</a></li>
            <li><a href="/News/Search">Поиск новостей</li>
            <li><a href="/Users/All">Список пользователей</a></li>
        </ul>
    </div>
</div>
<div class="container clearfix">
    <?php  foreach ($news as $item):?>
    <div class="articles clearfix">
        <div class="info-date clearfix">
            <a href="" class="date-news">April 17, 2016</a>
            <a href="" class="name-user">Steve Jobs</a>
            <a href="" class="comments-news">Comments</a>
        </div>

<div class="info">

        <div class="title">
            <h1> <?=$item['title']; ?> </h1>
        </div>
        <div class="descr-article">
            <?=$item['text']; ?>
        </div>
</div>
    <ul class="admin-article clearfix">
        <li class="update-news">
            <a href="/news/Update/<?=$item['id']; ?>">Обновить новость</a>
        </li>
        <li class="delete-news">
            <a href="/news/Del/<?=$item['id']; ?>">Удалить новость</a>
        </li>
        <li>
            <a href="/news" style="text-decoration:  none; color: darkblue;">Вернуться</a>
        </li>
    </ul>

    </div>
    <?php endforeach; ?>
</div>

</body>
</html>


