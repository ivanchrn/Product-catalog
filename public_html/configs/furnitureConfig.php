<?php

require_once(dirname(__DIR__ ) . '/configs/products.php');
require_once(dirname(__DIR__ ) . "/utils/uuid.php");

class Furniture extends Products
{
    private $furn_id;
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $height, $width, $length)
    {
        $product_id = time();
        $this->furn_id = UUID::generate();
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;

      parent::__construct($product_id, $sku, $name, $price, "INSERT INTO furniture (id, product_id, height, width, length) VALUES ('$this->furn_id', $product_id, '$this->height', '$this->width', '$this->length')");
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
       return $this->height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
       return $this->width;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }
    
    public function getLength()
    {
       return $this->length;
    }
}

?>