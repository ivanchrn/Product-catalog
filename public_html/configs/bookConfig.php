<?php

require_once(dirname(__DIR__ ) . '/configs/products.php');
require_once(dirname(__DIR__ ) . "/utils/uuid.php");

class Book extends Products 
{
    protected $book_id;
    protected $weight;

    public function __construct($sku, $name, $price, $weight)
    {
        $product_id = time();
        $this->book_id = UUID::generate();
        $this->weight = $weight;

        parent::__construct($product_id, $sku, $name, $price, "INSERT INTO book (id, product_id, weight) VALUES ('$this->book_id', $product_id, '$this->weight')");
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight()
    {
       return $this->weight;
    }
}

?>