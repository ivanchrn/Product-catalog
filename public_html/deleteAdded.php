<?php
    require_once(dirname(__DIR__ ) . '/public_html/configs/addConfig.php');

    $dl = new addConfig();
    foreach($_POST['check'] as $id)
    {
        $dl->delete($id);
    }
 
    header('Location: /public_html/index.php');    
?>