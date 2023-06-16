<?php
require_once '../db/db_connection.php';
require_once 'product.php';
$connection = $dbConnection->getConnection();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $productType = $_POST['productType'];

    $attribute = '';
    $value = '';
    switch ($productType) {
        case 'DVD':
            $attribute = 'Size';
            $value = $_POST['size'];
            break;
        case 'Book':
            $attribute = 'Weight';
            $value = $_POST['weight'];
            break;
        case 'Furniture':
            $attribute = 'Dimensions';
            $value = $_POST['height'] . 'x' . $_POST['width'] . 'x' . $_POST['length'];
            break;
        default:
    
            break;
    }

    $product = new Product($connection);
    $product->setSKU($sku);
    $product->setName($name);
    $product->setPrice($price);
    $product->setAttribute($attribute);
    $product->setValue($value);
    $product->add();
    header('Location:../index.php');
    exit();
}
$connection->close();
?>
