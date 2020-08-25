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
    <form action="index.php?technician_manager" method="post" id="addTechnicianForm">
        <input type="hidden" name="action" value="addTechnician" />

        <h4 class='labelStyle' >First Name</h4>
        <input class='inputStyle' name = "techFirstName" 
        />
        <?php echo $fields->getField('techFirstName')->getHTML(); ?>
     

        <h4 class='labelStyle' >Last Name</h4>
        <input class='inputStyle' name = "techLastName" 
        />
        <?php echo $fields->getField('techLastName')->getHTML();?>

        <h4 class='labelStyle' >Email</h4>
        <input class='inputStyle' name = "techEmail" 
        />
        <?php echo $fields->getField('techEmail')->getHTML();?>


        <h4 class='labelStyle' >Phone</h4>
        <input class='inputStyle' name = "techPhone" 
        />
        <?php echo $fields->getField('techPhone')->getHTML();?>
        
        <h4 class='labelStyle' >Password</h4>
        <input class='inputStyle' name = "techPassword" 
        />
        <?php echo $fields->getField('techPassword')->getHTML();?>

        </br>
        <input style='margin-top:10px;' type='submit' value='Add Technician' />
    </form>
    <p><a href="index.php?action=technician_manager">View Technicians</a></p>
</main>
<?php include '../view/footer.php';?>