<style>
.inputStyle{
    border: 1px solid #2b2b2b;
}
.labelStyle {
    margin: 5px auto;
    font-weight:400
}
</style>
<?php include '../view/header.php'; ?>
<main>
    <form action="index.php?product_manager" method="post" id="addProductForm">
         <input type="hidden" name="action" value="addProductForm" />

        <h4 class='labelStyle' >Code</h4>
        <input class='inputStyle' name = "productCode" />

        <h4 class='labelStyle' >Name</h4>
        <input class='inputStyle' name = "productName" />

        <h4 class='labelStyle' >Version</h4>
        <input class='inputStyle' name = "productVersion" />

        <h4 class='labelStyle' >Release Date</h4>
        <input class='inputStyle' name = "productReleaseDate"/>

        </br>
        <input style='margin-top:10px;' type='submit' value='Add Product' />
    </form>
    <p><a href="index.php?action=product_manager">View Product List</a></p>
</main>
<?php include '../view/footer.php';?>