<?php
require_once(dirname(__DIR__ ) . '/configs/connDB.php');

class Config extends Connection
{
    public function __construct() 
    {
        $this->createConnection();
    }

    public function fetchAll()
    {
        try
        {
            $stm = $this->getDbCnx()->prepare(" SELECT products.id, products.name, products.price, products.sku, book.weight, dvd.size, furniture.height, furniture.width, furniture.length
                                                FROM products
                                                LEFT JOIN book ON products.id = book.product_id
                                                LEFT JOIN dvd ON products.id = dvd.product_id
                                                LEFT JOIN furniture ON products.id = furniture.product_id
                                                ORDER BY products.sku;
            ");
            $stm->execute();
            return $stm->fetchAll();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try
        {
            $stm = $this->getDbCnx()->prepare(" DELETE products, dvd, book, furniture
                                                FROM products 
                                                LEFT JOIN dvd ON products.id = dvd.product_id  
                                                LEFT JOIN book ON products.id = book.product_id 
                                                LEFT JOIN furniture ON products.id = furniture.product_id
                                                WHERE products.id = '$id';
                                        ");
            $stm->execute();
            return $stm->fetchAll();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
}
?>