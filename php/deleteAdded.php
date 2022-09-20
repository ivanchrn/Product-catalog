<?php

    require_once('configs/addConfig.php');
    include 'ChromePhp.php';

    $dl = new addConfig();

    foreach($_POST['check'] as $id)
    {
        ChromePhp::log($id);
        $dl->delete($id);
    }
 
    header('Location: /php/index.php');

    
?>