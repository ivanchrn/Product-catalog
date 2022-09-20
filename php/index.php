<?php
    require_once("configs/addConfig.php");
    require_once("configs/dvdConfig.php");

    $data = new addConfig();
    $all = $data->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header class = "header">
    <form id="product_form" action="/php/deleteAdded.php" method="post">
        <div class="container">
            <div class="header__inner">
                <div class="header__name">Product <yellow>List</yellow></div>
                <div class = "header__buttons">

                        <button class="buttons" onclick="location.href='/php/addPage.php'" type="button">ADD</button>
                        <button class="buttons" name="delete" type="submit">MASS DELETE</button>
                    
                </div>
            </div>
        </div>
<div class="product_list">
    <div class="container">
        <div class="product_boxes">
            <?
                foreach($all as $key => $val){
            ?>
                <div class="product_box">
                    <ul>
                        <input class="delete_checkbox" type="checkbox" name="check[]" value="<?= $val['product_id']; ?>">
                        <li><?=$val['name'] ?></li>
                        <li><?=$val['sku'] ?></li>
                        <li><?=$val['price'] ?> $ </li>
                        <? if($val['size'] > 0){ 
                        ?>
                            <li><?=$val['size'] ?> MB </li>
                        <?
                        } 
                        ?>
                        <? if($val['weight'] > 0){
                        ?>
                            <li><?=$val['weight'] ?> KG </li>
                        <?
                        } 
                        ?>
                        <? if($val['height'] > 0 && $val['width'] > 0 && $val['length'] > 0){
                        ?>
                            <li>Dimension: <?=$val['height'] ?>x<?=$val['width'] ?>x<?=$val['length'] ?> CM</li>
                        <?
                        }
                        ?>

                    </ul>
                </div>
            <?
            }
            ?>
         </div>

    </div>
</div>
</form>
</header>

</body>
</html>