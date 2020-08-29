<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/

// Sample data
$cat_id = 1;

// Get the products
$products = get_products_by_category($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster';
$product = get_product_by_name($product_name);
// Delete the product and display an appropriate messge
if($product){
    $product_id = $product['productID'];
    $row_count = delete_product($product_id);
    if($row_count > 0){
        $delete_message="$row_count row was deleted";
    }else{
        $delete_message = "No rows were deleted.";
    }
}


/***************************************
 * Insert a product
 ****************************************/
// Sample data
$category_id = 1;
$code='tele';
$name='Fender Telecaster';
$description = 'NA';
$price= '949.99';
$discountProce=0;


// Insert the data
$newItem = add_product($category_id,$code, $name,$description,$price,$discountProce);

// Display an appropriate message
if($newItem){
    if($row_count > 0){
        $insert_message="1 row was inserted with the product ID: $newItem";
    }else{
        $insert_message = "No rows were inserted.";
    }
}


include 'home.php';
?>