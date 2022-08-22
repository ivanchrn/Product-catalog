<?php

require 'connect.php';

foreach($_POST['check'] as $id){
    mysqli_query($connect, query: "DELETE FROM `products` WHERE `products` . `id` =  " . (int) $id);

}


// header('Location: /php/index.php');
// var_dump($_POST['check']);