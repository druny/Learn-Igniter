<!doctype html>
<html lang=ru>

<head>
    <meta charset="UTF-8">
    <title>Новостная лента</title>
    <link rel="stylesheet" href="/css/style.css">
<body>

<div class="header">
    <div class="container">
        <ul class="menu">
            <li><a href="/news">Новостная лента</a></li>
            <li><a href="/news/add">Добавление новостей</a></li>
            <li><a href="/News/Search">Поиск новостей</li>
            <li><a href="/Users/All">Список пользователей</a></li>
        </ul>
        <!-- <?php /* foreach ($news as $category):*/?>
            <ul class="category_menu">
                <li>
                    <a href="/news/all/?category=<?/*=$category['category_name']; */?>">
                        <?/*=$category['category']; */?>
                    </a>
                </li>
            </ul>
        --><?php /*endforeach;  */?>
    </div>
</div>

<div class="container">
    <?php  foreach ($news as $item):?>
        <img src="/uploads/<?= $item['img'] ?>" class="news-img">
        <div class="articles clearfix">
            <div class="info-date clearfix">
                <a href="" class="date-news">April 17, 2016</a>
                <a href="" class="name-user">Steve Jobs</a>
                <!--<a href="/News/Category/<?/*= $item['category_name']; */?>" class="comments-news"><!--Comments-->
                <?/*= $item['category']; */?>
                </a>
            </div>
            <div class="info">
                <div class="title">
                    <h1><a href="/News/One/<?= $item['id'] ?>"><?=$item['title']; ?></a></h1>
                </div>
                <div class="descr-article">
                    <p><?=$item['text']; ?></p>
                </div>
            </div>

            <ul class="admin-article">
                <li class="update-news">
                    <a href="/news/update/<?=$item['id']; ?>">Обновить новость</a>
                </li>
                <li class="delete-news">
                    <a href="/news/del/<?=$item['id']; ?>">Удалить новость</a>
                </li>
            </ul>
        </div>

    <?php endforeach; ?>
    <div style="color: #fff">
        <?=$this->pagination->create_links(); ?>
    </div>
</div>
</body>
</html>
</body>
</html>