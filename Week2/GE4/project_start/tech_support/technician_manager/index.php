<?php

require '../model/database.php';
require '../model/technician.php';

//import modules
require '../model/fields.php';
require '../model/validation.php';

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
if ($action === null) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action === null) {
    $action = 'technician_manager';
  }
}

echo $action;

$goBack = '/project_start/tech_support/technician_manager';

switch ($action) {
  case 'under_construction':
    include '../under_construction.php';
    break;
  case 'technician_manager':
    include './technician_manager.php';
    break;
  case 'technician_add':
    include './technician_add.php';
    break;
  case 'deleteTechnician':
    $techID = filter_input(INPUT_POST, 'techID');
    $technicianListAfterDelete = Technician::deleteTechnician($techID);
    include './technician_manager.php';
    break;
  case 'addTechnicianForm':
    include './technician_manager.php';
    break;
  case 'addTechnician':
    //get form data
    $techFirstName = filter_input(INPUT_POST, 'techFirstName');
    $techLastName = filter_input(INPUT_POST, 'techLastName');
    $techEmail = filter_input(INPUT_POST, 'techEmail');
    $techPhone = filter_input(INPUT_POST, 'techPhone');
    $techPassword = filter_input(INPUT_POST, 'techPassword');

    //validate fields
    $validate->text('techFirstName', $techFirstName, true, 1);
    $validate->text('techLastName', $techLastName, true, 1);
    $validate->email('techEmail', $techEmail, true);
    $validate->phone('techPhone', $techPhone, true);
    $validate->text('techPassword', $techPassword, true);

    //display errors
    if ($fields->hasErrors()) {
      //Display Errors
      $error = 'Invalid technician data. Check all fields and try again.';
      include '../errors/error.php';
    } else {
      $technicianListAfterDelete = Technician::addTechnician(
        $techFirstName,
        $techLastName,
        $techEmail,
        $techPhone,
        $techPassword
      );
      include './technician_manager.php';
    }
    break;
}
?>
