<?php
require_once './db/db_connection.php';
require_once './Add-Products/product.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/product.php';
$connection = $dbConnection->getConnection();

// Retrieve products from the database
$sql = "SELECT * FROM products";
$result = $connection->query($sql);

$products = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = new ProductList($row['sku'], $row['name'], $row['price'], $row['attribute'], $row['value']);
    }
}

$connection->close();

include './ProductList/product_list.php';
?>
<hr>
<h1 style="text-align:center;">Scandiweb Test assignment</hr>
