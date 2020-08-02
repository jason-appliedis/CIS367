<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$headerPath = $path . "/Week1/GP2/view/header.php";
$footerPath = $path . "/Week1/GP2/view/header.php";
include_once($headerPath);
$productListPath = "product_manager";
?>
<main>
    <h1>Add Product</h1>
    <form action="product_manager" method="POST" id="add_product_form">
        <input type="hidden" name="action" value="add_product" />

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category->getID(); ?>">
                <?php echo $category->getName(); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Code:</label>
        <input type="text" name="code">
        <br>

        <label>Name:</label>
        <input type="text" name="name">
        <br>

        <label>List Price:</label>
        <input type="text" name="price">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product">
        <br>
    </form>
    <p><a href="<?php echo $productListPath ?>">View Product List</a></p>
</main>
<?php include_once($footerPath); ?>