<?php

require('../model/database.php');
require('../model/product.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action === NULL){
            $action='product_manager';
    }
}


switch($action){

    case 'under_construction':
        include('../under_construction.php');
        break;
    case 'product_manager':
        include('./product_manager.php');
        break;
    case 'product_add':
        include('./product_add.php');
        break;
    case 'deleteProduct':
        $productCode = filter_input(INPUT_POST, 'productCode'); 
        $productListAfterDelete = Product::deleteProduct($productCode);
        include('./product_manager.php');
        break;
    case 'addProductForm' :
        $productCode = filter_input(INPUT_POST, 'productCode'); 
        $productName = filter_input(INPUT_POST, 'productName');  
        $productVersion = filter_input(INPUT_POST, 'productVersion'); 
        $productReleaseDate= filter_input(INPUT_POST, 'productReleaseDate'); 
        $productListAfterDelete = Product::addProduct($productCode, $productName, $productVersion, $productReleaseDate);
        include('./product_manager.php');
        break;
}
?>
