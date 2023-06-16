<?php


class Product {
    private $sku;
    private $name;
    private $price;
    private $attribute;
    private $value;
  
    public function setSKU($sku) {
        $this->sku = $sku;
    }
  
    public function setName($name) {
        $this->name = $name;
    }
  
    public function setPrice($price) {
        $this->price = $price;
    }
  
    public function setAttribute($attribute) {
        $this->attribute = $attribute;
    }
  
    public function setValue($value) {
        $this->value = $value;
    }
  
    public function add() {
        $dbConnection = new DBConnection('localhost', 'id20898378_scweb', 'Scweb123.', 'id20898378_scweb');
        $connection = $dbConnection->getConnection();
    
        $sql = "INSERT INTO products (sku, name, price, attribute, value) VALUES (?, ?, ?, ?, ?)";
  

        $stmt = $connection->prepare($sql);
  
  
        $stmt->bind_param("sssss", $this->sku, $this->name, $this->price, $this->attribute, $this->value);
  
    
        $stmt->execute();
  
      
        $stmt->close();
        $connection->close();
    }

}
class ProductList
{
    private $sku;
    private $name;
    private $price;
    private $attribute;
    private $value;

    public function __construct($sku, $name, $price, $attribute, $value)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->attribute = $attribute;
        $this->value = $value;
    }


    public function getSKU()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getAttribute()
    {
        return $this->attribute;
    }

    public function getValue()
    {
        return $this->value;
    }
}
?>