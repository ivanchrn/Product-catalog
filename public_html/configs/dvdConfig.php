<?php 

require_once(dirname(__DIR__ ) . '/configs/products.php');
require_once(dirname(__DIR__ ) . "/utils/uuid.php");

class Dvd extends Products 
{
    private $dvd_id;
    private $size; 

    public function __construct($sku, $name, $price, $size)
    {
        $product_id = time();
        $this->dvd_id = UUID::generate();
        $this->size = $size;

        parent::__construct($product_id, $sku, $name, $price, "INSERT INTO dvd (id, product_id, size) VALUES ('$this->dvd_id', $product_id, '$this->size')");
    }

    public function setSize($size)
    {
        $this->size = $size;
    }
    
    public function getSize()
    {
       return $this->size;
    }
}

?>