<?php

require_once('addConfig.php');

class Furniture extends addConfig
{
    private $height;
    private $width;
    private $length;
    private $furn_id;

    public function __construct()
    {
      parent::__construct();
      $this->furn_id = UUID::generate();
      $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function insertData()
    {
        try
        {
            $stm = $this->dbCnx->prepare("  INSERT INTO furniture (id, product_id, height, width, length) 
                                            VALUES (?, ?, ?, ?, ?)
                                        ");
            $stm->execute([$this->furn_id, $this->product_id, $this->height, $this->width, $this->length]);
        }
        catch(Expection $e)
        {
            return $e->getMessage();
        }
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