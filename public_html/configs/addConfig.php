<?php
include (dirname(__DIR__ ) . "/utils/uuid.php");
require_once(dirname(__DIR__ ) . '/configs/connDB.php');



class addConfig extends Connection
{

    private $sku;
    private $name;    
    private $price;

    public function __construct()
    {
        $this->product_id = time();
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
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

    // public function checkSku($sku)
    // {
    //     try
    //     {
    //         $stm = $this->dbCnx->prepare("SELECT sku FROM products WHERE sku = :sku");                           
    //         $stm->bindParam(':sku', $sku);
    //         $stm->execute();


    //         if($stm->rowCount() > 0)
    //         {
    //             echo 'yes';
    //         } 
    //         else 
    //         {
    //             echo 'no';
    //         }
    //     }
    //     catch(Expection $e)
    //     {
    //         return $e->getMessage();
    //     }
    // }

    public function insertData()
    {
        try
        {
            $stm = $this->dbCnx->prepare("  INSERT INTO products(id,sku,name,price) 
                                            VALUES (?,?,?,?)
                                        ");
            $stm->execute([$this->product_id, $this->sku, $this->name, $this->price]);
        }
        catch(Expection $e)
        {
            return $e->getMessage();
        }
    }

    public function fetchAll()
    {
        try
        {
            $stm = $this->dbCnx->prepare("  SELECT * 
                                            FROM products p 
                                            LEFT JOIN dvd d ON(p.id = d.product_id) 
                                            LEFT JOIN book b ON(p.id = b.product_id)
                                            LEFT JOIN furniture f ON(p.id = f.product_id)
                                        ");
            $stm->execute();
            return $stm->fetchAll();
        }
        catch(Expection $e)
        {
            return $e->getMessage();
        }
    }

    public function fetchOne()
    {
        try
        {
            $stm = $this->dbCnx->prepare("  SELECT * FROM products 
                                            WHERE id=?
                                        ");
            $stm->execute([$this->product_id]);
            return $stm->fetchAll();
        }
        catch(Expection $e)
        {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try
        {
            $stm = $this->dbCnx->prepare("  DELETE products, dvd, book, furniture
                                            FROM products  
                                            INNER JOIN dvd ON products.id = dvd.product_id  
                                            INNER JOIN book ON products.id = book.product_id 
                                            INNER JOIN furniture ON products.id = furniture.product_id
                                            WHERE products.id = ?;
                                        ");
            $stm->execute([$id]);
            return $stm->fetchAll();
        }
        catch(Expection $e)
        {
            return $e->getMessage();
        }
    }
}
?>