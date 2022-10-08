<?php
require_once(dirname(__DIR__ ) . '/public_html/configs/config.php');

if(!empty($_POST["sku"])) 
{
    $usku=$_POST["sku"];
    $sql ="SELECT sku FROM products WHERE sku=:sku";

    $dbConfig = new Config();
    $query = $dbConfig->getDbCnx()->prepare($sql);
    $query -> bindParam(':sku', $usku, PDO::PARAM_STR);
    $query -> execute();
}

if($query -> rowCount() > 0)
{
    echo "<div style='color:red'>SKU Already Exist.</div>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
}
else
{
    echo "<div style='color:green'>SKU Available.</div>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
}

?>