<?php include("path.php");
include("app/database/queries.php");
$defaultpost = defaultPost();
$postscount = 0;
$example = 0;
$lastpost = false;
if(isset($_GET['post'])) {
    $relocate = $_GET['post'];
    $posts = checkFastNewsTo($relocate);
} else {
    $posts = checkFastNews();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="http://localhost/news/assets/css/style.css" type="text/css">
</head>
<body>
    <?php include("app/include/header.php"); ?>
    <a href="<?= BASE_URL . 'news.php?post=' . $defaultpost['id'] ?>"><div class="box-img">
        <img class="main-jpg" src="<?= BASE_URL . 'assets/images/' . $defaultpost['image'] ?>">
        <h2 class="img-title-text"><?= $defaultpost['title'] ?></h2>
        <h3 class="img-precontent-text"><?= $defaultpost['announce'] ?></h3>
    </div></a>
    <h2 class="bar-news">Новости</h2>
    <div class="newsbar">
        <?php function returnPosts($posts) {
            global $postscount;
            global $defaultpost;
            global $example;
            global $lastpost;
            $example++;
            if ($example == 1) {
                $postscount += 5;
            } else {
                $postscount += 4;
            }
             foreach ($posts as $post):
                if($post['id'] == $postscount) {
                    break;
                } else {
                    if($defaultpost['id'] == $post['id']) {
                        $lastpost = true;
                    }?>
        <div class="news-first">
            <p class="time-news"><?= $post['date(date)'] ?></p>
            <p class="title-news"><?= $post['title'] ?></p>
            <p class="precontent-news"><?= strip_tags($post['announce']) ?></p>
            <a href="<?=  BASE_URL . 'news.php?post=' . $post['id'];?>"><button class="btn-news">Подробнее</button></a>
        </div>
        <?php } endforeach; } returnPosts($posts);?>
    </div>
    <div class="navbtn">
        <a href="<?=  BASE_URL . 'index.php'?>"><button class="navbtnclick">1</button></a>
        <a href="<?=  BASE_URL . 'index.php?post=' . $postscount+=4?>"><button class="navbtnclick">2</button></a>
        <a href="<?=  BASE_URL . 'index.php?post=' . $postscount+=4?>"><button class="navbtnclick">3</button></a>
        <?php if($lastpost) {
            ?><style>.navbtnclick {width: 188px;}</style><?php
        } else {
            ?><a href="<?=  BASE_URL . 'index.php?post=' . $postscount+=4?>"><button class="navbtnclick">→</button></a><?php
        } ?>
    </div>
    <?php include("app/include/footer.php"); ?>
</body>
</html>