<?php
   require_once(dirname(__DIR__ ) . '/public_html/configs/addConfig.php');
   require_once(dirname(__DIR__ ) . '/public_html/configs/configConn.php');
?>
<link rel="stylesheet" href="css/style.css">
<form id="product_form" action="addProcess.php" method="post">
   <div class="container">
      <div class="header__inner">
         <div class="header__name">Product <span class="yellowcolor">Add</span></div>
         <div class="header__buttons">
            <button class="buttons" type="submit" name="send" id="submit">SAVE</button>
            <button class="buttons" onclick="location.href='index.php'" type="button">CANCEL</button>
         </div>
      </div>
      <div class="form">
         <label for="sku">SKU:</label>
         <input class="product__inpt" name="sku" id="sku" type="text" placeholder="Input SKU" required onBlur="checkskuAvailability()" oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')"><br>
         <div class="avail_status" id="sku-availability-status"></div><br>
         <label for="name">Name:</label>
         <input class="product__inpt" name="name" id="name" type="text" placeholder="Input name of product" required oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')"><br>
         <label for="price">Price($):</label>
         <input class="product__inpt" name="price" id="price" type="number" placeholder="Input price" required oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')"><br>
         <label for="productType">Type Switcher:</label>
         <select class="product__select" name="productType" id="productType" required oninvalid="this.setCustomValidity('Please, provide the data of indicated type')" oninput="this.setCustomValidity('')">
            <option value="">Choose type of product</option>
            <option value="dvd">DVD</option>
            <option value="furniture">Furniture</option>
            <option value="book">Book</option>
         </select>
         <div class="type__product" id="dvd">
            <label for="size">DVD Size (MB):</label>
            <input class="product__input" name="size" id="size" type="number" placeholder="Input size" oninvalid="this.setCustomValidity('Please, provide size')" oninput="this.setCustomValidity('')"><br>
            <div class="discription">*Please, provide size of product in MB</div>
         </div>
         <div class="type__product" id="furniture">
            <label for="size">Put your parametrs:</label>
            <input class="product__input" name="height" id="height" type="number" placeholder="Input height (CM)" oninvalid="this.setCustomValidity('Please, provide dimensions')" oninput="this.setCustomValidity('')"><br>
            <input class="product__input" name="width" id="width" type="number" placeholder="Input width (CM) " oninvalid="this.setCustomValidity('Please, provide dimensions')" oninput="this.setCustomValidity('')"><br>
            <input class="product__input" name="length" id="length" type="number" placeholder="Input length (CM)" oninvalid="this.setCustomValidity('Please, provide dimensions')" oninput="this.setCustomValidity('')"><br>
            <div class="discription">*Please, provide right dimension of product in HxWxL format</div>
         </div>
         <div class="type__product" id="book">
            <label for="size">Put weight of book:</label>
            <input class="product__input" name="weight" id="weight" type="number" placeholder="Input weight -(KG) " oninvalid="this.setCustomValidity('Please, provide weight')" oninput="this.setCustomValidity('')"><br>
            <div class="discription">*Please, provide weight of product in KG</div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>
         //Attr required
         $(function() 
         {
            $("#productType").on('change', function()
               {
                 $(".type__product").hide();
                 $(".product__input").val("");
                 $('.product__input').removeAttr('required');
                 let product = $(this).val();
                 $(`#${product}`).show();
                 $(`#${product} > .product__input`).prop('required', true);
               }).change();
         });
      </script> 
      <script>
//This function checks sku-availability-status
         function checkskuAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
            url: "configs/check_availability.php",
            data:'sku='+$("#sku").val(),
            type: "POST",
            success:function(data){
            $("#sku-availability-status").html(data);
            $("#loaderIcon").hide();
            },
            error:function (){}
            });
         }
      </script> 
   </div>
</form>
