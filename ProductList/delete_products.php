<?php
require_once '../db/db_connection.php';

class ProductDeletion {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function deleteProducts($productIds) {
        if (!empty($productIds)) {
            $placeholders = rtrim(str_repeat('?,', count($productIds)), ',');

            $sql = "DELETE FROM products WHERE sku IN ($placeholders)";

            $stmt = $this->connection->prepare($sql);

            if ($stmt === false) {
                return "Error preparing the statement: " . $this->connection->error;
            }

            $stmt->bind_param(str_repeat('s', count($productIds)), ...$productIds);

            if ($stmt->execute() === true) {
                return true;
            } else {
                return "Error deleting products: " . $stmt->error;
            }
        } else {
            return "No products selected for deletion.";
        }
    }

    public function closeConnection() {
        $this->connection->close();
    }
}

// Usage

$connection = $dbConnection->getConnection();

$deletion = new ProductDeletion($connection);

if (isset($_POST['product_ids'])) {
    $productIds = $_POST['product_ids'];

    // Input validation: Ensure that the product IDs are valid before proceeding
    // You can perform additional validation if needed

    // Example validation: Only allow alphanumeric values for product IDs
    $productIds = array_filter($productIds, 'ctype_alnum');

    $result = $deletion->deleteProducts($productIds);

    if ($result === true) {
        header("Location: ../index.php");
        die();
    } else {
        echo $result;
    }
} else {
    echo "No products selected for deletion.";
}

$deletion->closeConnection();
?>