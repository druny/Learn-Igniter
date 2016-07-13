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
<form action="/news/add"  method="post" enctype="multipart/form-data">
   <label> <h2>Заголовок: </h2>
    <input type="text" name="title">
    </label>
    <br>
    <label>
    <h2>Текст</h2>
        <input type="text" name="text">
    <!--<textarea type="text" name="text">
        </textarea>
        <script type="text/javascript">
            CKEDITOR.replace( 'text');
        </script>-->
    </label>
    <input type="file" name="img">
    <select name="category_id">
        <option value="1">Статьи</option>
        <option value="2">Сниппеты</option>
    </select>
    <input  type="submit" value="Добавить">

</div>

</form>
</body>
</html>