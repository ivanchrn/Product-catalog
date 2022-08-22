<?php

require 'connect.php';
 
$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];

mysqli_query($connect, query: "INSERT INTO `products` (`id`, `name`, `sku`, `price`) VALUES (NULL, '$name', '$sku', '$price')");

header('Location: /php/index.php');
?>