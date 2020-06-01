<?php
require_once 'database.php';
$client_id = 7;
$query ="
SELECT `item id`, `order id` FROM `order item`
    WHERE `customer id` = '$client_id';
";
$result = mysqli_query($link, $query) or die("Cannot get data: " . mysqli_error($link));
if($result) {
    $rows = mysqli_num_rows($result);
    $products = array();
    for ($i = 0 ; $i < $rows ; $i++) $products[] = mysqli_fetch_assoc($result);
    if ($products == []) {
        print "can't find orders of this user";
    } else {
        print json_encode($products, JSON_UNESCAPED_UNICODE);
    }
}
