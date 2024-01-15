<?php 

require('settings.php');


function tt($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function checkError($query) {
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
}

function checkFastNews() {
    global $pdo;
    $fastNews = "select id, date(date), title, announce from news";
    $query = $pdo->prepare($fastNews);
    $query->execute();
    checkError($query);
    return $query->fetchAll();
}

function checkFastNewsTo($id) {
    global $pdo;
    $fastNews = "select id, date(date), title, announce from news where id > ($id-4) and id <= $id";
    $query = $pdo->prepare($fastNews);
    $query->execute();
    checkError($query);
    return $query->fetchAll();
}
// tt(checkFastNewsTo('10'));

function defaultPost() {
    global $pdo;
    $defaultpost = "select id, date(date), title, announce, image from news order by id desc";
    $query = $pdo->prepare($defaultpost);
    $query->execute();
    checkError($query);
    return $query->fetch();
}

function selectedPost($id) {
    global $pdo;
    $post = "select id, date(date), title, announce, content, image from news where id = $id";
    $query = $pdo->prepare($post);
    $query->execute();
    checkError($query);
    return $query->fetch();
}




// function returnPosts($posts) {
//     foreach ($posts as $post):
//         $count++;
//         if($count == 4) {
//             break;
//         } else {

//         }
//     endforeach;
// }

?>