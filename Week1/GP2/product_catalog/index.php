<?php
require('../model/database.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/product.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    $current_category = new CategoryDB();
    $current_category->getCategory($category_id);
    
    $categories = new CategoryDB();
    $categories->getCategories();

    $productDB = new ProductDB();
    $product = $productDB->getProductsByCategory($category_id);

    include('../view/phpimcludes/catalog_product_list.php');
} else if ($action == 'view_product') {
    $categories = new CategoryDB();
    $categories->getCategories();

    $product_id = filter_input(INPUT_GET, 'product_id', 
            FILTER_VALIDATE_INT);   
    $productDB = new ProductDB();
    $product = $productDB->getProduct($product_id);

    include('../view/phpimcludes/product_view.php');
}
?>