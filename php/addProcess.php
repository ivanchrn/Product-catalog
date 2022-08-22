<?php

    if(isset($_POST['send'])){
        require_once('addConfig.php');
        $sc = new addConfig();

        $sc->setSKU($_POST['sku']);
        $sc->setName($_POST['name']);
        $sc->setPrice($_POST['price']);
        $sc->insertData();


    }

    header('Location: /php/index.php');

?>