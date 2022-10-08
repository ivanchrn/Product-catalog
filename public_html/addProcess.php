<?php

    if(isset($_POST['send']))
    {
        require_once(dirname(__DIR__ ) . "/public_html/configs/config.php");
        require_once(dirname(__DIR__ ) . "/public_html/configs/dvdConfig.php");
        require_once(dirname(__DIR__ ) . "/public_html/configs/bookConfig.php");
        require_once(dirname(__DIR__ ) . "/public_html/configs/furnitureConfig.php");

        switch ($_POST['productType'])
        {
            case ("dvd") :
                $scDvd = new Dvd($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['size']);
                $scDvd -> insertData();
                break;
            case ("book") :
                $scBook = new Book($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['weight']);
                $scBook -> insertData();
                break;
            case ("furniture"):
                $scFurn = new Furniture($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['height'], $_POST['width'], $_POST['length']);
                $scFurn -> insertData();
                break;
        }
    }

    header('Location: /public_html/index.php');
?>