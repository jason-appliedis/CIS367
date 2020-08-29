<?php
     class Customer {
        private 
        $customerID, 
        $customerFirstName, 
        $customerLastName,
        $customerAddress,
        $customerCity,
        $customerState,
        $customerPostalCode,
        $customerCountryCode,
        $customerPhone,
        $customerEmail,
        $customerPassword,
        $foundCustomer;
        private function __construct(){
        $this->customerFirstName='John'; 
        $this->customerLastName='Doe';
        $this->customerAddress='123 Main way';
        $this->customerCity='No city';
        $this->customerState='NS';
        $this->customerPostalCode='55555';
        $this->customerCountryCode='US';
        $this->customerPhone='555-555-5555';
        $this->customerEmail='jdoe@sportspro.com';
        $this->customerPassword='sesame';
        }
        //getters
        public function getCustomerID(){
            return $this->customerID;
        }
        public function getCustomerFirstName(){
            return $this->customerFirstName;
        }
        public function getCustomerLastName(){
            return $this->customerLastName;
        }
        public function getcustomerAddress(){
            return $this->customerAddress;
        }
        public function getCustomerCity(){
            return $this->customerCity;
        }
        public function getCustomerState(){
            return $this->customerState;
        }
        public function getCustomerPostalCode(){
            return $this->customerPostalCode;
        }
        public function getCustomerCountryCode(){
            return $this->customerCountryCode;
        }
        public function getCustomerPhone(){
            return $this->customerPhone;
        }
        public function getCustomerEmail(){
            return $this->customerEmail;
        }
        public function getCustomerPassword(){
            return $this->customerPassword;
        }

        //setters 
        public function setCustomerID($value) {
            $this->customerID = $value;
        }
        public function setCustomerFirstName($value) {
            $this->customerFirstName = $value;
        }
        public function setCustomerLastName($value) {
            $this->customerLastName = $value;
        }
        public function setcustomerAddress($value){
            $this->customerEmail= $value;
        }
        public function setCustomerCity($value){
            $this->customerPhone= $value;
        }
        public function setCustomerState($value){
            $this->customerPassword= $value;
        }
        public function setCustomerPostalCode($value){
            $this->customerPostalCode= $value;
        }
        public function setCustomerCountryCode($value){
            $this->customerCountryCode= $value;
        }
        public function setCustomerPhone($value){
            $this->customerPhone= $value;
        }
        public function setCustomerEmail($value){
            $this->customerEmail= $value;
        }
        public function setCustomerPassword($value){
            $this->customerPassword= $value;
        }
        //gets first 10 customers 
        public function getCustomers(){
            global $db;
            $customers = array();
            try {
            $query = 'SELECT * FROM customers ORDER BY customerID LIMIT 10';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                display_db_error($error_message);
            }
            foreach ($rows as $row) {
                $customer = new Customer();
                $customer->setCustomerID($row['customerID']);
                $customer->setCustomerFirstName($row['firstName']);
                $customer->setCustomerLastName($row['lastName']);
                $customer->setcustomerAddress($row['address']);
                $customer->setCustomerCity($row['city']);
                $customer->setCustomerState($row['state']);
                $customer->setCustomerPostalCode($row['postalCode']);
                $customer->setCustomerCountryCode($row['countryCode']);
                $customer->setCustomerPhone($row['phone']);
                $customer->setCustomerEmail($row['email']);
                $customer->setCustomerPassword($row['PASSWORD']);
                $customers[] = $customer;
            }
            return $customers;
        }
        public function getCustomer ($customerLastName){
            global $db;
            try {
                $query = "SELECT * FROM customers
                WHERE lastName = :customerLastName";
                $statement = $db->prepare($query);
                $statement->bindValue(':customerLastName', $customerLastName);
                $statement->execute();
                $foundCustomer = $statement->fetch();
                $statement->closeCursor();
                return $foundCustomer;
                }catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    display_db_error($error_message);
                }
        }
        public function addTechnician($techFirstName, $techLastName, $techEmail, $techPhone,$techPassword){
            global $db;
            try {
                $query =    "INSERT INTO technicians
                                (firstName, lastName, email, phone, PASSWORD)
                            VALUES
                                ('$techFirstName', '$techLastName', '$techEmail', '$techPhone','$techPassword')";
                $row_count = $db->exec($query);
                 return $row_count;
            }catch (PDOException $e){
                $error_message = $e->getMessage();
                display_db_error($error_message);
            }
        }
}
?>

