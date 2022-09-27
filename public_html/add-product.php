<link rel="stylesheet" href="css/style.css">
<form id="product_form" action="addProcess.php" method="post">
   <div class="container">
      <div class="header__inner">
         <div class="header__name">Product Add</div>
         <div class="header__buttons">
            <button class="buttons" type="submit" name="send">SAVE</button>
            <button class="buttons" onclick="location.href='index.php'" type="button">CANCEL</button>
         </div>
      </div>
      <div class="form">
         <label for="sku">SKU:</label>
         <input class="product__inpt" name="sku" id="sku" type="number" placeholder="Input SKU" required oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')"><br>
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
            <div class="discription">*Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel mollitia dolorem optio, error at tenetur inventore ullam minima laudantium enim incidunt maxime sunt commodi quos tempora unde, et nesciunt suscipit!</div>
         </div>
         <div class="type__product" id="furniture">
            <label for="size">Put your parametrs:</label>
            <input class="product__input" name="height" id="height" type="number" placeholder="Input height (CM)" oninvalid="this.setCustomValidity('Please, provide dimensions')" oninput="this.setCustomValidity('')"><br>
            <input class="product__input" name="width" id="width" type="number" placeholder="Input width (CM) " oninvalid="this.setCustomValidity('Please, provide dimensions')" oninput="this.setCustomValidity('')"><br>
            <input class="product__input" name="length" id="length" type="number" placeholder="Input length (CM)" oninvalid="this.setCustomValidity('Please, provide dimensions')" oninput="this.setCustomValidity('')"><br>
            <div class="discription">*Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel mollitia dolorem optio, error at tenetur inventore ullam minima laudantium enim incidunt maxime sunt commodi quos tempora unde, et nesciunt suscipit!</div>
         </div>
         <div class="type__product" id="book">
            <label for="size">Put weight of book:</label>
            <input class="product__input" name="weight" id="weight" type="number" placeholder="Input weight -(KG) " oninvalid="this.setCustomValidity('Please, provide weight')" oninput="this.setCustomValidity('')"><br>
            <div class="discription">*Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel mollitia dolorem optio, error at tenetur inventore ullam minima laudantium enim incidunt maxime sunt commodi quos tempora unde, et nesciunt suscipit!</div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>
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
         })         
       </script>
   </div>
</form>