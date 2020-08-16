<?php
     class Product {
        private $productCode, $NAME, $VERSION, $releaseDate;
        private function __construct(){
            $this->productCode = '0';
            $this->NAME = 'default';
            $this->VERSION = '1';
            $this->releaseDate = '01/01/1970';
        }
        //getters
        public function getProductCode(){
            return $this->productCode;
        }
        public function getNAME(){
            return $this->NAME;
        }
        public function getVERSION(){
            return $this->VERSION;
        }
        public function getReleaseDate(){
            return $this->releaseDate;
        }
        //setters 
        public function setProductCode($value) {
            $this->productCode = $value;
        }
        public function setNAME($value) {
            $this->NAME = $value;
        }
        public function setVERSION($value) {
            $this->VERSION = $value;
        }
        public function setReleaseDate($value) {
            $this->releaseDate = $value;
        }
        public function getProducts(){
            global $db;
            $products = array();
            try {
            $query = 'SELECT * FROM products ORDER BY productCode';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                display_db_error($error_message);
            }
            foreach ($rows as $row) {
                $product = new Product();
                $product->setProductCode($row['productCode']);
                $product->setNAME($row['NAME']);
                $product->setVERSION($row['VERSION']);
                $product->setReleaseDate($row['releaseDate']);
                $products[] = $product;
            }
            return $products;
        }
        public function deleteProduct ($productCode){
            global $db;
            try {
                $query = "DELETE FROM products
                WHERE productCode = '$productCode'";
                $statement = $db->prepare($query);
                $statement->execute();
                $statement->closeCursor();
                }catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    display_db_error($error_message);
                }
        }
        public function addProduct($productCode, $productName, $productVersion, $productReleaseDate){
            global $db;
            try {
                $query =    "INSERT INTO products
                                (productCode, NAME, VERSION, releaseDate)
                            VALUES
                                ('$productCode', '$productName', '$productVersion', '$productReleaseDate')";
                echo $query;
                $row_count = $db->exec($query);
                 return $row_count;
            }catch (PDOException $e){
                $error_message = $e->getMessage();
                display_db_error($error_message);
            }
        }
}
?>