<?php

require_once ("database.php");

abstract class Connection{

    protected $dbCnx;
    protected $product_id;

    public function __construct()
    {
        $this->product_id = time();
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    
}

?>