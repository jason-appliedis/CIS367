<?php
class Product
{
  private $productCode, $name, $version, $releaseDate;
  private function __construct()
  {
    $this->productCode = '0';
    $this->name = 'default';
    $this->version = '1';
    $this->releaseDate = '01/01/1970';
  }
  //getters
  public function getProductCode()
  {
    return $this->productCode;
  }
  public function getName()
  {
    return $this->name;
  }
  public function getVersion()
  {
    return $this->version;
  }
  public function getReleaseDate()
  {
    return $this->releaseDate;
  }
  //setters
  public function setProductCode($value)
  {
    $this->productCode = $value;
  }
  public function setName($value)
  {
    $this->name = $value;
  }
  public function setVersion($value)
  {
    $this->version = $value;
  }
  public function setReleaseDate($value)
  {
    $this->releaseDate = $value;
  }
  public function getProducts()
  {
    global $db;
    $products = [];
    try {
      $query = 'SELECT * FROM products ORDER BY productCode';
      $statement = $db->prepare($query);
      $statement->execute();
      $rows = $statement->fetchAll();
      $statement->closeCursor();
    } catch (PDOException $e) {
      $error_message = $e->getMessage();
      display_db_error($error_message);
    }
    foreach ($rows as $row) {
      $product = new Product();
      $product->setProductCode($row['productCode']);
      $product->setName($row['name']);
      $product->setVersion($row['version']);
      $product->setReleaseDate($row['releaseDate']);
      $products[] = $product;
    }
    return $products;
  }
  public function deleteProduct($productCode)
  {
    global $db;
    try {
      $query = "DELETE FROM products
                WHERE productCode = '$productCode'";
      $statement = $db->prepare($query);
      $statement->execute();
      $statement->closeCursor();
    } catch (PDOException $e) {
      $error_message = $e->getMessage();
      display_db_error($error_message);
    }
  }
  public function addProduct(
    $productCode,
    $productName,
    $productVersion,
    $productReleaseDate
  ) {
    global $db;
    try {
      $query = "INSERT INTO products
                                (productCode, name, version, releaseDate)
                            VALUES
                                ('$productCode', '$productName', '$productVersion', '$productReleaseDate')";
      echo $query;
      $row_count = $db->exec($query);
      return $row_count;
    } catch (PDOException $e) {
      $error_message = $e->getMessage();
      display_db_error($error_message);
    }
  }
}
?>
