<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_category($category_id) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE categoryID = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
function add_category($category_name){
    global $db;
    $query = 'INSERT INTO categories (categoryName)
              VALUES (:category_name)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_name', $category_name);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message= $e->getMessage();
        display_db_error($error_message);
    }
}
function delete_category($category_id){
    global $db;
    $query = 'DELETE FROM categories WHERE categoryID = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message= $e->getMessage();
        display_db_error($error_message);
    }
}
function count_products($category_id){
    global $db;
    $query = 'SELECT COUNT(*) as total FROM `products` WHERE categoryID = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $row_count = $statement->execute();
        $result = $statement->fetch();
        $row_count=$result['total'];
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message= $e->getMessage();
        display_db_error($error_message);
    }
}
?>