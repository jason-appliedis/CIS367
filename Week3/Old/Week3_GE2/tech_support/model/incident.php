<?php
     class Incident {
        private 
        $incidentId, 
        $incidentCustomerId, 
        $incidentProductCode, 
        $incidentTechId, 
        $incidentDateOpened,
        $incidentDateClosed, 
        $incidentTitle, 
        $incidentDescription,
        $incidentCustomerFirstName,
        $incidentCustomerLastName;
        private function __construct(){
            $this->techFirstName = 'Jim';
            $this->techLastName = 'Smith';
            $this->techEmail = 'jims@sportspro.com';
            $this->techPhone = '555-867-5309';
            $this->techPassword = 'sessame';
        }
        //getters
        public function getIncidentId(){
            return $this->incidentId;
        }
        public function getIncidentCustomerId(){
            return $this->incidentCustomerId;
        }
        public function getIncidentProductCode(){
            return $this->incidentProductCode;
        }
        public function getIncidentTechId(){
            return $this->incidentTechId;
        }
        public function getIncidentDateOpened(){
            return $this->incidentDateOpened;
        }
        public function getIncidentDateClosed(){
            return $this->incidentDateClosed;
        }
        public function getIncidentTitle(){
            return $this->incidentTitle;
        }
        public function getIncidentDescription(){
            return $this->incidentDescription;
        }
        public function getIncidentCustomerFirstName(){
            return $this->incidentCustomerFirstName;
        }
        public function getIncidentCustomerLastName(){
            return $this->incidentCustomerLastName;
        }
        //setters 
       public function setIncidentId($value){
        return $this->incidentId=$value;
        }
        public function setIncidentCustomerId($value){
            return $this->incidentCustomerId=$value;
        }
        public function setIncidentProductCode($value){
            return $this->incidentProductCode=$value;
        }
        public function setIncidentTechId($value){
            return $this->incidentTechId=$value;
        }
        public function setIncidentDateOpened($value){
            return $this->incidentDateOpened=$value;
        }
        public function setIncidentDateClosed($value){
            return $this->incidentDateClosed=$value;
        }
        public function setIncidentTitle($value){
            return $this->incidentTitle=$value;
        }
        public function setIncidentDescription($value){
            return $this->incidentDescription=$value;
        }
        public function setIncidentCustomerFirstName($value){
            return $this->incidentCustomerFirstName=$value;
        }
        public function setIncidentCustomerLastName($value){
            return $this->incidentCustomerLastName=$value;
        }



        public function getUnAssignedIncidents(){
            global $db;
            $incident = array();
            try {
            $query = 'SELECT * FROM `incidents` INNER JOIN customers ON incidents.customerID=customers.customerID WHERE `techID` IS NULL';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                display_db_error($error_message);
            }
            foreach ($rows as $row) {
                $incident = new Incident();
                $incident->setIncidentId($row['incidentID']);
                $incident->setIncidentCustomerId($row['customerID']);
                $incident->setIncidentProductCode($row['productCode']);
                $incident->setIncidentTechId($row['techID']);
                $incident->setIncidentDateOpened($row['dateOpened']);
                $incident->setIncidentDateClosed($row['dateClosed']);
                $incident->setIncidentTitle($row['title']);
                $incident->setIncidentDescription($row['description']);
                $incident->setIncidentCustomerFirstName($row['firstName']);
                $incident->setIncidentCustomerLastName($row['lastName']);
                $incidents[] = $incident;
            }
            return $incidents;
        }
       public function getOpenIncidents($techID){
        global $db;
        try {
        $query = "SELECT COUNT('techID') FROM `incidents` where techID=$techID";
        $statement = $db->prepare($query);
        $statement->execute();
        $count = $statement->fetch()["COUNT('techID')"];
        $statement->closeCursor();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        return $count;
       }
       public function getIncident($incidentId){
        global $db;
        try {
        $query = "SELECT * FROM `incidents` INNER JOIN customers ON incidents.customerID=customers.customerID WHERE incidentID=$incidentId";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $incident = new Incident();
        $incident->setIncidentId($result['incidentID']);
        $incident->setIncidentProductCode($result['productCode']);
        $incident->setIncidentTechId($result['techID']);
        $incident->setIncidentCustomerFirstName($result['firstName']);
        $incident->setIncidentCustomerLastName($result['lastName']);
        $statement->closeCursor();
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        return $incident;
       }
       public function assignIncident($incidentId, $techId){
        global $db;
        try {
            $query = "UPDATE incidents SET
                           techID='$techId'
                            WHERE incidentID=$incidentId";
            $db->exec($query);
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}
?>