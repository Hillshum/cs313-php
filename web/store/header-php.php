<?php session_start();
$productStr = file_get_contents('products.json');
$json =  json_decode($productStr, true);
?>
