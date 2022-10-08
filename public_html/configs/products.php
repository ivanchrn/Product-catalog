<?php

require_once(dirname(__DIR__ ) . '/configs/config.php');
require_once(dirname(__DIR__ ) . '/configs/connDB.php');

class Products extends Config
{

    private $product_id;
    private $sku;
    private $name;    
    private $price;
    private $sqlScript;

    public function __construct($product_id, $sku, $name, $price, $sqlScript)
    {
        $this->product_id = $product_id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->sqlScript = $sqlScript;

        parent::__construct();
    }

    public function getID()
    {
       return $this->product_id;
    }

    public function setSKU($sku)
    {
        $this->sku = $sku;
    }

    public function getSKU()
    {
       return $this->sku;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
       return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    public function getPrice()
    {
       return $this->price;
    }

    public function insertData() 
    {
        $this->postDataDB("INSERT INTO products(id,sku,name,price) VALUES ('$this->product_id', '$this->sku', '$this->name', '$this->price')");
        $this->postDataDB($this->sqlScript);
    }
}
?>