<?php
require('../model/database.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/product.php');
require('../model/product_db.php');


//set up global path
$path = $_SERVER['DOCUMENT_ROOT'];
$pathToIncludesResources = $path . "/Week1/GP2/view/phpimcludes/";




console_log_string('Action Before');
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  
console_log_string('Action After');
console_log_string($action);
//changed to switch for readability 
switch($action){
    case 'list_products':
        listProducts();
        break;
    case 'delete_product':
        deleteProducts();
        break;
    case 'show_add_form':
        showAddForm();
        break;
    case 'add_product':
        addProduct();
        break;

}


function listProducts(){
    global $pathToIncludesResources;
    $category_id = filter_input(INPUT_GET, 'category_id', 
    FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    // Get product and category data
    // $current_category = CategoryDB::getCategory($category_id);
    $categoryDB = new CategoryDB();
    $current_category = $categoryDB->getCategory($category_id);
    $categories = $categoryDB->getCategories();

    $productDB = new ProductDB();
    $products = $productDB->getProductsByCategory($category_id);

     // Display the product list
     include("$pathToIncludesResources/manager_product_list.php");
} 
function deleteProducts(){
    global $pathToIncludesResources;
    console_log_string('Delete After');
 // Get the IDs
    $product_id = filter_input(INPUT_POST, 'product_id', 
    FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
    FILTER_VALIDATE_INT);

    // Delete the product
    $productDB = new ProductDB();
    $product = $productDB->deleteProduct($product_id);
    $redirectPath = "$pathToIncludesResources?category_id=$category_id";
    console_log_string(' $redirectPat');
    console_log_string( $redirectPath);

    // Display the Product List page for the current category 
    header("Location: product_manager?category_id=$category_id");
}
function showAddForm(){
    global $pathToIncludesResources;
    console_log_string('Show add form');
    // $categories = CategoryDB::getCategories();
    $categoryDB = new CategoryDB();
    $categories = $categoryDB->getCategories();

    include("$pathToIncludesResources/product_add.php");
}
function addProduct(){
    global $pathToIncludesResources;
    $category_id = filter_input(INPUT_POST, 'category_id', 
    FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price');
    if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
        $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../view/phpincludes/errors/error.php');
    } else {
    // $current_category = CategoryDB::getCategory($category_id);
    $categoryDB = new CategoryDB();
    $current_category = $categoryDB->getCategory($category_id);
     // Delete the product
    $productDB = new ProductDB();
    $productToAdd = new Product();
        $productToAdd->setCode( $code);
        $productToAdd->setName($name);
        $productToAdd->setPrice($price);
        $productToAdd->setCategory($current_category);
        $response = $productDB->addProduct($productToAdd);
        console_log_string($response);

    // Display the Product List page for the current category
    header("Location: product_manager?category_id=$category_id");
}
}
function console_log_string( $data ){
    echo '<script>';
    echo 'console.log("'.  $data  .'")';
    echo '</script>';
  }
?>