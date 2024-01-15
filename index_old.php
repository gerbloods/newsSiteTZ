<?php
require_once 'settings.php';
$connection = new mysqli($host, $user,$password,  $data);
if($connection->connect_error) die('error');

$query = "select * from news";
$result = $connection->query($query);
if(!$result) die('error query');


$rows = $result->num_rows;

for ($i = 0; $i < $rows; ++$i) {
    $result->data_seek($i);
    echo 'Title: ' . $result->fetch_assoc()['title'] . '<br>';
}


$result->close();
$connection->close();


// echo '<pre>';
// print($rows);
// echo '</pre>';

?>