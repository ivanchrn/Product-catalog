<?php
   require_once(dirname(__DIR__ ) . '/public_html/configs/addConfig.php');
   
   $data = new addConfig();
   $all = $data->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
   </head>
   <body>
      <header class = "header">
         <form id="product_form" action="deleteAdded.php" method="post">
            <div class="container">
               <div class="header__inner">
                  <div class="header__name">
                     Product <span class="yellowcolor">List</span>
                  </div>
                  <div class = "header__buttons">
                     <button class="buttons" onclick="location.href='add-product.php'" type="button">ADD</button>
                     <button class="buttons" name="delete" type="submit">MASS DELETE</button>
                  </div>
               </div>
            </div>
            <div class="product_list">
               <div class="container">
                  <div class="product_boxes">
                     <?php foreach($all as $key=>$val): ?>
                     <div class="product_box">
                        <ul>
                           <input class="delete-checkbox" type="checkbox" name="check[]" value="<?= $val['product_id']; ?>">
                           <li><?= $val['name']; ?></li>
                           <li><span class="yellowcolor"><?= $val['sku']; ?></span></li>
                           <li><?= $val['price']; ?><span class="yellowcolor"> $</span> </li>

                           <?php if($val['size'] > 0) : ?>
                              <li><?= $val['size']; ?><span class="yellowcolor"> MB </span></li>
                           <?php endif; ?>

                           <?php if($val['weight'] > 0) : ?>
                              <li><?= $val['weight']; ?><span class="yellowcolor"> KG </span></li>
                           <?php endif; ?>

                           <?php if($val['height'] > 0 && $val['width'] > 0 && $val['length'] > 0) : ?>
                              <li>Dimension: <?= $val['height']; ?><span class="yellowcolor">x</span><?= $val['width']; ?><span class="yellowcolor">x</span><?= $val['length']; ?> <span class="yellowcolor">CM</span></li>
                           <?php endif; ?>        
                        </ul>
                     </div>
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>
         </form>
      </header>
   </body>
</html>