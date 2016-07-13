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
        <img src="/uploads/<?= $item['img'] ?>" class="news-img">
        <div class="articles clearfix">
            <div class="info-date clearfix">
                <a href="" class="date-news">April 17, 2016</a>
                <a href="" class="name-user">Steve Jobs</a>
                <a href="" class="comments-news">Comments</a>
            </div>

            <div class="info">
                <form action="/news/update/<?=$item['id'] ?>" method="post">
                    <div class="title">
                        <textarea name="title"><?=$item['title']; ?></textarea>
                    </div>
                    <div class="descr-article">
                        <textarea name="text"><?=$item['text']; ?></textarea>
                    </div>
                    <input type="file" name="img">
                    <input type="submit">
                </form>
            </div>
            <ul class="admin-article clearfix">
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


