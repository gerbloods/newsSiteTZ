<?php
$driver = 'mysql';
$host = 'localhost';
$db_name = 'news_db';
$db_user = 'root';
$db_password = 'mysql';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user, $db_password, $options
    );
} catch(PDOException $i) {
    die("Ошибка подключения к базе данных");
}

?>