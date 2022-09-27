<?php 

require_once(dirname(__DIR__ ) . '/configs/addConfig.php');

class Dvd extends addConfig 
{
    private $dvd_id;
    private $size; 

    public function __construct()
    {
        parent::__construct();
        $this->dvd_id = UUID::generate();
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function insertData()
    {
        try
        {
            $stm = $this->dbCnx->prepare("  INSERT INTO dvd (id, product_id, size) 
                                            VALUES (?, ?, ?)
                                        ");
            $stm->execute([$this->dvd_id, $this->product_id, $this->size]);
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
                                            JOIN dvd d ON(p.id = d.product_id) 
                                            JOIN book b ON(p.id = b.product_id)
                                            JOIN furniture f ON(p.id = f.product_id)
                                        ");
            $stm->execute();
            return $stm->fetchAll();
        }
        catch(Expection $e)
        {
            return $e->getMessage();
        }
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