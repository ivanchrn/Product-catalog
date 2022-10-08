<?php

require_once ("database.php");

abstract class Connection
{
    private $dbCnx;

    public function createConnection()
    {
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    
    public function postDataDB($sqlScript)
    {
        try
        {
            $this->dbCnx->prepare($sqlScript)->execute();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function getDbCnx() 
    {
        return $this->dbCnx;
    }

    //console debug
    
    static function debug_to_console($data) 
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}

?>