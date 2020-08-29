<?php
     class Technician {
        private $techID, $techFirstName, $techLastName, $techEmail, $techPhone,$techPassword;
        private function __construct(){
            $this->techFirstName = 'Jim';
            $this->techLastName = 'Smith';
            $this->techEmail = 'jims@sportspro.com';
            $this->techPhone = '555-867-5309';
            $this->techPassword = 'sessame';
        }
        //getters
        public function getTechID(){
            return $this->techID;
        }
        public function getTechFirstName(){
            return $this->techFirstName;
        }
        public function getTechLastName(){
            return $this->techLastName;
        }
        public function getTechEmail(){
            return $this->techEmail;
        }
        public function getTechPhone(){
            return $this->techPhone;
        }
        public function getTechPassword(){
            return $this->techPassword;
        }

        //setters 
        public function setTechID($value) {
            $this->techID = $value;
        }
        public function setTechFirstName($value) {
            $this->techFirstName = $value;
        }
        public function setTechLastName($value) {
            $this->techLastName = $value;
        }
        public function setTechEmail($value) {
            $this->techEmail = $value;
        }
        public function setTechPhone($value) {
            $this->techPhone = $value;
        }
        public function setTechPassword($value) {
            $this->techPassword = $value;
        }
        public function getTechnicians(){
            global $db;
            $technicians = array();
            try {
            $query = 'SELECT * FROM technicians ORDER BY techID';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                display_db_error($error_message);
            }
            foreach ($rows as $row) {
                $technician = new Technician();
                $technician->setTechID($row['techID']);
                $technician->setTechFirstName($row['firstName']);
                $technician->setTechLastName($row['lastName']);
                $technician->setTechEmail($row['email']);
                $technician->setTechPhone($row['phone']);
                $technician->setTechPassword($row['PASSWORD']);
                $technicians[] = $technician;
            }
            return $technicians;
        }
        public function deleteTechnician ($techID){
            global $db;
            try {
                $query = "DELETE FROM technicians
                WHERE techID = '$techID'";
                $statement = $db->prepare($query);
                $statement->execute();
                $statement->closeCursor();
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
        public function getTech($techID){
         global $db;
            $technicians = array();
            try {
            $query = "SELECT * FROM technicians WHERE techID=$techID";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                display_db_error($error_message);
            }
           return $result;
        }
}
?>