<?php

    require_once('addConfig.php');

    $dl = new addConfig();

    foreach($_POST['check'] as $id){
        $dl->setID($id);
        $dl->delete();
    
    }
    
  
        
    header('Location: /php/index.php');

    
?>