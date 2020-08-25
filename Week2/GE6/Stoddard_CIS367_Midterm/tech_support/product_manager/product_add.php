<style>
.inputStyle{
    border: 1px solid #2b2b2b;
}
.labelStyle {
    margin: 5px auto;
    font-weight:400
}
</style>
<?php
include '../view/header.php'; 
?>
<main>
<h2>Add a product</h2>
    <form action="index.php?product_manager" method="post" id="addProductForm">
         <input type="hidden" name="action" value="addProduct" />

        <h4 class='labelStyle' >Code</h4>
        <input class='inputStyle' name = "productCode" 
        />
        <?php echo $fields->getField('productCode')->getHTML(); ?>
     

        <h4 class='labelStyle' >Name</h4>
        <input class='inputStyle' name = "productName" 
        />
        <?php echo $fields->getField('productName')->getHTML();?>

        <h4 class='labelStyle' >Version</h4>
        <input class='inputStyle' name = "productVersion" 
        />
        <?php echo $fields->getField('productVersion')->getHTML();?>


        <h4 class='labelStyle' >Release Date</h4>
        <input class='inputStyle' name = "productReleaseDate" 
        />
        <span>$nsbp Use "yyyy/mm/dd" format.</span>
        <?php echo $fields->getField('productReleaseDate')->getHTML();?>
       

        </br>
        <input style='margin-top:10px;' type='submit' value='Add Product' />
    </form>
    <p><a href="index.php?action=product_manager">View Product List</a></p>
</main>
<?php include '../view/footer.php';?>