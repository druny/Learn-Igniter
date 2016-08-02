<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">


</head>
<body>

<div class="header">
    <div class="container">
        <ul class="menu">
            <li><a href="/news">Новостная лента</a></li>
            <li><a href="/news/add">Добавление новостей</a></li>
            <li><a href="/News/Search">Поиск новостей</li>
            <li><a href="/Users/All">Список пользователей</a></li>
        </ul>
    </div>
</div>
<div class="container ">
    <form action="/helpers/validation"  method="post">
        <label>
            <?= form_error('title'); ?>
            <h2>Заголовок: </h2>
            <input type="text" name="title">
        </label>
        <br>
        <label>
            <?= form_error('text'); ?>
            <h2>Текст</h2>
            <input type="text" name="text">

        </label>
        <input  type="submit" value="Добавить">

</div>

</form>
</body>
</html>