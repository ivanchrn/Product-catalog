<?php

require_once(dirname(__DIR__ ) . '/configs/addConfig.php');

class Book extends addConfig 
{
    private $weight;
    private $book_id;

    public function __construct()
    {
        parent::__construct();
        $this->book_id = UUID::generate();
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function insertData()
    {
        try
        {
            $stm = $this->dbCnx->prepare("  INSERT INTO book (id, product_id, weight) 
                                            VALUES (?, ?, ?)
                                        ");
            $stm->execute([$this->book_id, $this->product_id, $this->weight]);
        }
        catch(Expection $e)
        {
            return $e->getMessage();
        }
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