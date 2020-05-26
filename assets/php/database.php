<?php
$hostName = 'localhost';
$databaseName = 'internet_shop_db';
$userName = 'root';
$password = ' ';

$link = mysqli_connect($hostName, $userName, $password, $databaseName) or die("Cannot connect to server: " . mysqli_error($link));
