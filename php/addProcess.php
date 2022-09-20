<?php
include 'ChromePhp.php';

    if(isset($_POST['send'])){
        require_once('addConfig.php');
        
        $sc = new addConfig();

        $sc->setSKU($_POST['sku']);
        $sc->setName($_POST['name']);
        $sc->setPrice($_POST['price']);
        $sc->insertData();

        $aaa = $sc->getID();
        ChromePhp::log($aaa);

        $scDvd = new Dvd();
        $scDvd->setSize($_POST['size']);
        $scDvd->insertData();

    }

    // header('Location: /php/index.php');



?>