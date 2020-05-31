<?php
require_once 'database.php';
$email = "olya.plakidyk@gmail.com";
$phone = "+380975738923";
$delivery = "NYC";
$product_count = array(
    array(1,1),
    array(2,1),
    array(4,2)
);

$user_id ="SELECT id FROM `internet_shop_customers`.`customers data` WHERE `e-mail` = '$email' and phone='$phone'";
$result = mysqli_query($link, $user_id) or die("Cannot get data: " . mysqli_error($link));
$id = mysqli_fetch_row($result)[0];
if($id) {
    print "Add new order id = $id, delivery data: $delivery";
    $insert_o ="INSERT INTO `orders data` (id, `delivery data`) VALUES('$id', '$delivery')";
    mysqli_query($link, $insert_o) or die("Cannot get data: " . mysqli_error($link));
    $order_id ="SELECT id FROM `orders data` WHERE id = '$id'";
    $order = mysqli_query($link, $order_id) or die("Cannot get data: " . mysqli_error($link));
    $order_id = mysqli_fetch_row($order)[0];
    for($i = 0; $i < count($product_count); $i++) {
        $insert_po ="INSERT INTO `product_orders` (`order id`, `product id`, quantity) VALUES('$order_id','{$product_count[$i][0]}','{$product_count[$i][1]}')";
        mysqli_query($link, $insert_po) or die("Cannot get data: " . mysqli_error($link));
    }
} else {
    print "Can't find this user";
}
mysqli_free_result($result);
mysqli_close($link);
