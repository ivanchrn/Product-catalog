<?php
    require_once(dirname(__DIR__ ) . "/public_html/configs/config.php");
    require_once(dirname(__DIR__ ) . "/public_html/configs/connDB.php");

    $dl = new Config();
    foreach($_POST['check'] as $id)
    {
        $dl->delete($id);
    }
    
    header('Location: /public_html/index.php');    
?>