<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$globalPath = "GP2";
$productManagerPath = "$globalPath/product_manager";
$productCatalogPath = "$globalPath/product_catalog";
$headerPath = $path . "/Week1/GP2/view/header.php";
$footerPath = $path . "/Week1/GP2/view/header.php";
include_once($headerPath);
 ?>
<main>
    <h1>Menu</h1>
    <ul>
        <li>
            <a href="<?php echo $productManagerPath ?>">Product Manager</a>
        </li>
        <li>
            <a href="<?php echo $productCatalogPath ?>">Product Catalog</a>
        </li>
    </ul>
</main>
<?php include_once($footerPath); ?>