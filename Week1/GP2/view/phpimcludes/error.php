<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$headerPath = $path . "/Week1/GP2/view/header.php";
$footerPath = $path . "/Week1/GP2/view/footer.php";
include_once($headerPath);
?>
<div id="main">
    <h1 class="top">Error</h1>
    <p><?php echo $error; ?></p>
</div>
<?php include_once($footerPath); ?>