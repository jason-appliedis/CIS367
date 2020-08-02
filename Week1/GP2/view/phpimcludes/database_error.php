<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$headerPath = $path . "/Week1/GP2/view/header.php";
$footerPath = $path . "/Week1/GP2/view/footer.php";
include_once($headerPath);
?>
<main>
    <h1>Database Error</h1>
    <p class="first_paragraph">There was an error connecting to the database.</p>
    <p>The database must be installed as described in the appendix.</p>
    <p>MySQL must be running as described in chapter 1.</p>
    <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
</main>
<?php include_once($footerPath); ?>