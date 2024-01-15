<?php

$connection = new PDO("mysql:host=localhost;dbname=root", "root", "mysql");


// $query = "select * from news";
// $count = $connection->exec($query);

// echo $count;
$params = [
    'id' => 1
];

$selectAll = 'select * from news where id = :id';
$query = $connection->prepare($selectAll);
$query->execute($params);

?>