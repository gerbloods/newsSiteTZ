<?php include("path.php");
include("app/database/queries.php");
$post = selectedPost($_GET['post']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Название новости</title>
    <link rel="stylesheet" href="http://localhost/news/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="http://localhost/news/assets/css/styleNews.css" type="text/css">
</head>
<body>
    <?php include("app/include/header.php"); ?>
    <hr>
    <div class="navText">
        <a class="navRoute" href="<?php echo BASE_URL ?>">Главная</a>
        <a class="navRoute">&nbsp;/&nbsp;</a>
        <a class="endRoute"><?= $post['title'] ?></a>
    </div>
    <h1 class="titleNews"><?= $post['title'] ?></h1>
    <div class="selectedNewsCon">
        <p class="time-news"><?= $post['date(date)'] ?></p>
        <p class="title-news"><?= strip_tags($post['announce']) ?></p>
        <p class="contentNews"><?= strip_tags($post['content']) ?></p>
        <a href="<?php echo BASE_URL ?>"><button class="backBtn">←&nbsp;&nbsp; назад к новостям</button></a>

    </div>
    <img class="news-jpg" src="<?= BASE_URL . 'assets/images/' . $post['image'] ?>">
    <?php include("app/include/footer.php"); ?>
</body>
</html>