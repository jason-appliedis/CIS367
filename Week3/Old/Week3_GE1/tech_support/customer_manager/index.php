<?php

require('../model/database.php');
require('../model/customer.php');
require('../model/technician.php');

//import modules
require('../model/fields.php');
require('../model/validation.php');


//create the validte object and get the current fields
$validate = new Validate();
$fields = $validate->getFields();
//add code and name
$fields->addField('techFirstName');
$fields->addField('techLastName');
$fields->addField('techEmail');
$fields->addField('techPhone');
$fields->addField('techPassword');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action === NULL){
            $action='customer_manager';
    }
}
switch($action){
    case 'under_construction':
        include('../under_construction.php');
        break;
    case 'customer_manager':
        include('./customer_manager.php');
        break;
    case 'addCustomer':
        include('./customer_add.php');
        break;
    case 'searchCustomer':
        $customerLastName = filter_input(INPUT_POST, 'customerLastName');
        $customer = Customer::getCustomer($customerLastName);
        include('./customer_search.php');
        break;
    case 'getCustomer':
        $customerLastName = filter_input(INPUT_POST, 'customerLastName');
        $customer = Customer::getCustomer($customerLastName);
        include('./customer_search.php');
        break;

        
}
?>
