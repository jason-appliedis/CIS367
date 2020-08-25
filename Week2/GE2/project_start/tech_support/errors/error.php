<?php include '../view/header.php'; ?>
<main>
    <h1>Error</h1>
    <p><?php echo $error; ?></p>

    <br>
     <form action="." method="post" id="showAddForm">
        <input type="hidden" name="action" value="product_add" />
        <input class="buttonLink"type="submit" value="Go Back" /> 
    </form>
</main>
<?php include '../view/footer.php'; ?>
