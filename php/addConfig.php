<?php

require_once ("database.php");

class addConfig{

    protected $id;
    protected $sku;
    protected $name;    
    protected $price;
    protected $dbCnx;

    public function __construct($id="",$sku="",$name="",$price=""){
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;

        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function setID($id){
        $this->id = $id;
    }
    public function getID(){
       return $this->id;
    }
    public function setSKU($sku){
        $this->sku = $sku;
    }
    public function getSKU(){
       return $this->sku;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
       return $this->name;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getPrice(){
       return $this->price;
    }

    public function insertData(){
        try{
            $stm = $this->dbCnx->prepare("INSERT INTO products(id,sku,name,price) VALUES (?,?,?,?)");
            $stm->execute([$this->id, $this->sku, $this->name, $this->price]);
        }
        catch(Expection $e){
            return $e->getMessage();
        }
    }

    public function fetchAll(){
        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM products");
            $stm->execute();
            return $stm->fetchAll();
        }
        catch(Expection $e){
            return $e->getMessage();
        }
    }

    public function fetchOne(){
        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM products WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        }
        catch(Expection $e){
            return $e->getMessage();
        }
    }

    public function delete(){
        try{
            $stm = $this->dbCnx->prepare("DELETE FROM products WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        }
        catch(Expection $e){
            return $e->getMessage();
        }
    }
}

class Dvd extends addConfig {
    private $size; 
    private $product_id;

    public function __construct($id="", $sku="",$name="",$price="", $size="", $product_id=""){
        parent::__construct($id="",$sku="",$name="",$price="");

        $this->product_id = $product_id;
        $this->size = $size;

        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function insertData(){
        try{
            $stm = $this->dbCnx->prepare("INSERT INTO dvd (id, product_id, size) VALUES (?, ?, ?)");
            $stm->execute([$this->id, $this->product_id, $this->size]);
        }
        catch(Expection $e){
            return $e->getMessage();
        }
    }

    public function fetchAll(){
        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM dvd");
            $stm->execute();
            return $stm->fetchAll();
        }
        catch(Expection $e){
            return $e->getMessage();
        }
    }

    public function fetchOne(){
        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM dvd WHERE id=?");
            $stm->execute([$this->size]);
            return $stm->fetchAll();
        }
        catch(Expection $e){
            return $e->getMessage();
        }
    }

    public function delete(){
        try{
            $stm = $this->dbCnx->prepare("DELETE FROM dvd WHERE id=?");
            $stm->execute([$this->size]);
            return $stm->fetchAll();
        }
        catch(Expection $e){
            return $e->getMessage();
        }
    }

    public function setSize($size){
        $this->size = $size;
    }
    public function getSize(){
       return $this->size;
    }

    public function setID($id){
        $this->id = $id;
    }
    public function getID(){
       return $this->id;
    }
}

class Furniture extends addConfig{
    private $height;
    private $width;
    private $length;

    public function setHeight($height){
        $this->height = $height;
    }
    public function getHeight(){
       return $this->height;
    }
       public function setWidth($width){
        $this->width = $width;
    }
    public function getWidth(){
       return $this->width;
    }
       public function setLength($length){
        $this->length = $length;
    }
    public function getLength(){
       return $this->length;
    }
}

class Book extends addConfig {
    private $weight;

    public function setWeight($weight){
        $this->weight = $weight;
    }
    public function getWeight(){
       return $this->weight;
    }
}

?>