<?php
include 'ChromePhp.php';

    if(isset($_POST['send']))
    {
        require_once('configs/addConfig.php');
        require_once('configs/dvdConfig.php');
        require_once('configs/bookConfig.php');
        require_once('configs/furnitureConfig.php');

        
        $sc = new addConfig();

        $sc->setSKU($_POST['sku']);
        $sc->setName($_POST['name']);
        $sc->setPrice($_POST['price']);
        $sc->insertData();


        $scDvd = new Dvd();
        $scDvd->setSize($_POST['size']);
        $scDvd->insertData();

        $scBook = new Book();
        $scBook->setWeight($_POST['weight']);
        $scBook->insertData();

        $scFurniture = new Furniture();
        $scFurniture->setHeight($_POST['height']);
        $scFurniture->setWidth($_POST['width']);
        $scFurniture->setLength($_POST['length']);
        $scFurniture->insertData();
        

    }

    header('Location: /php/index.php');



?>