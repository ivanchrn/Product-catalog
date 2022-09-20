<link rel="stylesheet" href="/css/style.css">  
   
<form id="product_form" action="/php/addProcess.php" method="post">
<div class="container">
<div class="header__inner">
        <div class="header__name">Product <yellow>Add</yellow></div>
            <div class="header__buttons">
                <button class="buttons" type="submit" name="send">SAVE</button>
                <button  class="buttons" onclick="location.href='/php/index.php'" type="button">CANCEL</button>
            </div>
        
        </div>
        <div class="form">
            <label for="sku">SKU:</label>
                <input class="product__input" name="sku" id="sku" type="number" placeholder="Input SKU" required><br>
            <label for="name">Name:</label>
                <input class="product__input" name="name" id="name" type="text" placeholder="Input name of product" required><br>
            <label for="price">Price($):</label>
                <input class="product__input" name="price" id="price" type="number" placeholder="Input price" required><br>
            <label for="productType">Type Switcher:</label>

            <select class="product__select" name="productType" id="productType" required>
                <option value="">Choose type of product</option>
                <option value="dvd">DVD</option>
                <option value="furniture">Furniture</option>
                <option value="book">Book</option>
            </select>

            <div class="type__product" id="dvd">
                <label for="size">DVD Size (MB):</label>
                <input class="product__input" name="size" id="size" type="number" placeholder="Input size"><br>
                <div class="discription">*Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel mollitia dolorem optio, error at tenetur inventore ullam minima laudantium enim incidunt maxime sunt commodi quos tempora unde, et nesciunt suscipit!</div>
            </div>
            <div class="type__product" id="furniture">
                <label for="size">Put your parametrs:</label>
                <input class="product__input" name="height" id="height" type="number" placeholder="Input height (CM)"><br>
                <input class="product__input" name="width" id="width" type="number" placeholder="Input width (CM)"><br>
                <input class="product__input" name="length" id="length" type="number" placeholder="Input length (CM)"><br>
                <div class="discription">*Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel mollitia dolorem optio, error at tenetur inventore ullam minima laudantium enim incidunt maxime sunt commodi quos tempora unde, et nesciunt suscipit!</div>
            </div>
            <div class="type__product" id="book">
                <label for="size">Put weight of book:</label>
                <input class="product__input" name="weight" id="weight" type="number" placeholder="Input weight -(KG)"><br>
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
            $('.product__input').removeAttr('required');
            let product = $(this).val();
            $(`#­${product}>.product__input`).attr('required', 'true');
            $(`#${product}`).show();

        }).change();
    })


</script>
</div>       
</form>

