<?php
//get data base
$products = [];
$products = Product::getProducts();

include '../view/header.php';
?>
<main>
<table>
<tr>
    <th>Code</th>
    <th>Name</th>
    <th>Version</th>
    <th>Realese Date</th>
    <th>&nbsp;</th>
</tr>
<!-- construct the table rows -->
<?php foreach ($products as $product) { ?>
    <tr>
        <td><?php echo $product->getProductCode(); ?></td>
        <td><?php echo $product->getNAME(); ?></td>
        <td><?php echo $product->getVERSION(); ?></td>
        <td><?php echo $product->getReleaseDate(); ?></td>
        <td>
            <form action="." method="POST" id="deleteProductForm">
                <input type="hidden" name="action" value="deleteProduct" />
                <input type="hidden" name="productCode" value="<?php echo $product->getProductCode(); ?>" />
                <input type="submit" value="Delete" />
            </form> 
        </td>
    </tr>
<?php } ?>
</table>
<br>
<a style='margin-top:10px' href="index.php?action=product_add">Add Product</a>
</main>
<?php include '../view/footer.php'; ?>
