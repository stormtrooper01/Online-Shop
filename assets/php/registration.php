<?php
require_once 'database.php';
$e-mail = "masha.plakidyk@gmail.com";
$phone = "+380975738924";
$id = "15";
$query ="SELECT * FROM `customers data` WHERE `e-mail` = '$e-mail' or phone='$phone' or `id` = '$id'";
$result = mysqli_query($link, $query) or die("Cannot get data: " . mysqli_error($link));
if(mysqli_fetch_assoc($result) != [] && $result) {
    print "User already exists";
} else {
    print "Add new user $email:$phone";
    $insert ="INSERT INTO `customers data` (`e-mail`, phone, `id`) VALUES ('$email','$phone', '$id')";
    $insert_result = mysqli_query($link, $insert);
}
mysqli_free_result($result);
mysqli_close($link);
