<?php

require_once ("database.php");

class addConfig{

    private $id;
    private $sku;
    private $name;
    private $price;
    protected $dbCnx;

    public function __construct($id=0,$sku="",$name="",$price=""){
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
            $stm = $this->dbCnx->prepare("INSERT INTO products(sku,name,price) VALUES (?,?,?)");
            $stm->execute([$this->sku, $this->name, $this->price]);
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

?>