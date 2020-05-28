<?php
require_once 'database.php';
$query ="SELECT * FROM `items data`";
$result = mysqli_query($link, $query) or die("Cannot get data: " . mysqli_error($link));
if($result) {
    $rows = mysqli_num_rows($result);
    $products = array();
    for ($i = 0 ; $i < $rows ; $i++) $products[] = mysqli_fetch_assoc($result);
    print json_encode($products, JSON_UNESCAPED_UNICODE);
}
mysqli_free_result($result);
mysqli_close($link);
