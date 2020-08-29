<?php
require '../model/database.php';
require '../model/product.php';

//import modules
require '../model/fields.php';
require '../model/validation.php';

//create the validte object and get the current fields
$validate = new Validate();
$fields = $validate->getFields();
//add code and name
$fields->addField('productCode');
$fields->addField('productName');
$fields->addField('productVersion');
$fields->addField('productReleaseDate');

$action = filter_input(INPUT_POST, 'action');
if ($action === null) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action === null) {
    $action = 'product_manager';
  }
}
$goBack = '/project_start/tech_support/product_manager';

switch ($action) {
  case 'under_construction':
    include '../under_construction.php';
    break;
  case 'product_manager':
    include './product_manager.php';
    break;
  case 'product_add':
    include './product_add.php';
    break;
  case 'deleteProduct':
    $productCode = filter_input(INPUT_POST, 'productCode');
    $productListAfterDelete = Product::deleteProduct($productCode);
    include './product_manager.php';
    break;
  case 'addProduct':
    $datePattern = '/([1-2][0-9][0-9][0-9])+\/+([0-1]?[1-9])+\/+([0-3][1-9])+/';
    $dateErrMsg = 'Please enter a valid date';
    //get form data
    $productCode = filter_input(INPUT_POST, 'productCode');
    $productName = filter_input(INPUT_POST, 'productName');
    $productVersion = filter_input(
      INPUT_POST,
      'productVersion',
      FILTER_VALIDATE_FLOAT
    );
    $productReleaseDate = filter_input(INPUT_POST, 'productReleaseDate');

    //validate fields
    $validate->text('productCode', $productCode, true, 1);
    $validate->text('productName', $productName, true, 1);
    $validate->number('productVersion', $productVersion, true);
    $validate->pattern(
      'productReleaseDate',
      $productReleaseDate,
      $datePattern,
      $dateErrMsg,
      true
    );

    //display errors
    if ($fields->hasErrors()) {
      //Display Errors
      // include 'product_add.php';
      $error = 'Please check your fields and try again.';
      include '../errors/error.php';
    } else {
      $productListAfterDelete = Product::addProduct(
        $productCode,
        $productName,
        $productVersion,
        $productReleaseDate
      );
      include './product_manager.php';
    }
    break;
}
?>
