<?php

require_once(dirname(__DIR__ ) . '/configs/configConn.php');
require_once(dirname(__DIR__ ) . '/configs/addConfig.php');


//code check sku

if(!empty($_POST["sku"])) {
    $usku=$_POST["sku"];
    $sql ="SELECT sku FROM products WHERE sku=:sku";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':sku', $usku, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
} 
if($query -> rowCount() > 0){
    echo "<div style='color:red'> SKU Already Exist .</div>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
}
else
{
    echo "<div style='color:green'> SKU Available.</div>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
}

?>