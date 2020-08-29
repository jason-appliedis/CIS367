<?php

require '../model/database.php';
require '../model/customer.php';
require '../model/technician.php';

//import modules
require '../model/fields.php';
require '../model/validation.php';

//create the validte object and get the current fields
$validate = new Validate();
$fields = $validate->getFields();
//add code and name
$fields->addField('customerFirstName');
$fields->addField('customerLastName');
$fields->addField('customerAddress');
$fields->addField('customerCity');
$fields->addField('customerState');
$fields->addField('customerPostalCode');
$fields->addField('customerCountryCode');
$fields->addField('customerPhone');
$fields->addField('customerEmail');
$fields->addField('customerPassword');

$action = filter_input(INPUT_POST, 'action');
if ($action === null) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action === null) {
    $action = 'customer_manager';
  }
}
switch ($action) {
  case 'under_construction':
    include '../under_construction.php';
    break;
  case 'customer_manager':
    include './customer_manager.php';
    break;
  case 'addCustomerForm':
    include './customer_add.php';
    break;
  case 'searchCustomer':
    $customerLastName = filter_input(INPUT_POST, 'customerLastName');
    if (!empty($customerLastName)) {
      $customer = Customer::getCustomer($customerLastName);
    }
    include './customer_search.php';
    break;
  case 'getCustomer':
    $customerLastName = filter_input(INPUT_POST, 'customerLastName');
    $customer = Customer::getCustomer($customerLastName);
    include './customer_search.php';
    break;
  case 'addCustomer':
    $customerFirstName = filter_input(INPUT_POST, 'customerFirstName');
    $customerLastName = filter_input(INPUT_POST, 'customerLastName');
    $customerAddress = filter_input(INPUT_POST, 'customerAddress');
    $customerCity = filter_input(INPUT_POST, 'customerCity');
    $customerState = filter_input(INPUT_POST, 'customerState');
    $customerPostalCode = filter_input(INPUT_POST, 'customerPostalCode');
    $customerCountryCode = filter_input(INPUT_POST, 'customerCountryCode');
    $customerPhone = filter_input(INPUT_POST, 'customerPhone');
    $customerEmail = filter_input(INPUT_POST, 'customerEmail');
    $customerPassword = filter_input(INPUT_POST, 'customerPassword');

    //validate fields
    $validate->text('customerFirstName', $customerFirstName, true, 1, 50);
    $validate->text('customerLastName', $customerLastName, true, 1, 50);
    $validate->text('customerAddress', $customerAddress, true, 1, 50);
    $validate->text('customerCity', $customerCity, true, 1, 50);
    $validate->text('customerState', $customerState, true, 2, 2);
    $validate->text('customerPostalCode', $customerPostalCode, true, 1, 21);
    $validate->text('customerCountryCode', $customerCountryCode, true);
    $validate->phone('customerPhone', $customerPhone, true);
    $validate->email('customerEmail', $customerEmail, true);
    $validate->text('customerPassword', $customerPassword, true, 6, 21);
    if ($fields->hasErrors()) {
      //Display Errors
      include 'customer_add.php';
    } else {
      Customer::addCustomer(
        $customerFirstName,
        $customerLastName,
        $customerAddress,
        $customerCity,
        $customerState,
        $customerPostalCode,
        $customerCountryCode,
        $customerPhone,
        $customerEmail,
        $customerPassword
      );
      include './customer_manager.php';
    }
    break;
  case 'updateCustomerForm':
    $customerLastName = filter_input(INPUT_POST, 'customerLastName');
    $customer = Customer::getCustomer($customerLastName);

    //validate fields
    $validate->text('customerFirstName', "$customer[firstName]", true, 1, 50);
    $validate->text('customerLastName', "$customer[lastName]", true, 1, 50);
    $validate->text('customerAddress', "$customer[address]", true, 1, 50);
    $validate->text('customerCity', "$customer[city]", true, 1, 50);
    $validate->text('customerState', "$customer[state]", true, 2, 2);
    $validate->text('customerPostalCode', "$customer[postalCode]", true, 1, 21);
    $validate->text('customerCountryCode', "$customer[countryCode]", true);
    $validate->phone('customerPhone', "$customer[phone]", true);
    $validate->email('customerEmail', "$customer[email]", true);
    $validate->text('customerPassword', "$customer[password]", true, 6, 21);

    include 'customer_update.php';

    break;
  case 'updateCustomer':
    //get Fields
    $customerID = filter_input(INPUT_POST, 'customerID');
    $customerFirstName = filter_input(INPUT_POST, 'customerFirstName');
    $customerLastName = filter_input(INPUT_POST, 'customerLastName');
    $customerAddress = filter_input(INPUT_POST, 'customerAddress');
    $customerCity = filter_input(INPUT_POST, 'customerCity');
    $customerState = filter_input(INPUT_POST, 'customerState');
    $customerPostalCode = filter_input(INPUT_POST, 'customerPostalCode');
    $customerCountryCode = filter_input(INPUT_POST, 'customerCountryCode');
    $customerPhone = filter_input(INPUT_POST, 'customerPhone');
    $customerEmail = filter_input(INPUT_POST, 'customerEmail');
    $customerPassword = filter_input(INPUT_POST, 'customerPassword');
    //validate fields
    $validate->text('customerFirstName', $customerFirstName, true, 1, 50);
    $validate->text('customerLastName', $customerLastName, true, 1, 50);
    $validate->text('customerAddress', $customerAddress, true, 1, 50);
    $validate->text('customerCity', $customerCity, true, 1, 50);
    $validate->text('customerState', $customerState, true, 2, 2);
    $validate->text('customerPostalCode', $customerPostalCode, true, 1, 21);
    $validate->text('customerCountryCode', $customerCountryCode, true);
    $validate->phone('customerPhone', $customerPhone, true);
    $validate->email('customerEmail', $customerEmail, true);
    $validate->text('customerPassword', $customerPassword, true, 6, 21);
    if ($fields->hasErrors()) {
      //Display Errors
      $customer = Customer::getCustomer($customerLastName);
      include 'customer_update.php';
    } else {
      $customers = Customer::updateCustomer(
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
        $customerPassword
      );
      include './customer_manager.php';
    }
    break;
  case 'deleteCustomer':
    $customerID = filter_input(INPUT_POST, 'customerID');
    $customer = Customer::deleteCustomer($customerID);
    include 'customer_manager.php';

    break;
}
?>
