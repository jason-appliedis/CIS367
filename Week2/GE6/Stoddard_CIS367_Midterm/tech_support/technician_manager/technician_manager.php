<?php include '../view/header.php'; ?>
<?php 

//get data base
$technicians = array();
$technicians =  Technician::getTechnicians();

?>
<main>
<table>
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Password</th>
    <th>&nbsp;</th>
</tr>
<!-- construct the table rows -->
<?php foreach ($technicians as $technician) {
    ?>
    <tr>
    <td><?php  echo $technician->getTechFirstName() ?></td>
    <td><?php  echo $technician->getTechLastName() ?></td>
    <td><?php  echo $technician->getTechEmail() ?></td>
    <td><?php  echo $technician->getTechPhone() ?></td>
    <td><?php  echo $technician->getTechPassword() ?></td>
    <td>
    <form action="index.php?product_manager" method="post" id="deleteTechnicianForm">
        <input type="hidden" name="action" value="deleteTechnician" />
        <input type="hidden" name="techID" value="<?php echo $technician->getTechID() ?>" />
        <input type="submit" value="Delete" /> 
        </form>
    </td>
    </tr>
<?php
}
?>
</table>
<br>
<a style='margin-top:10px' href="index.php?action=technician_add">Add Technician</a>
</main>
<?php include '../view/footer.php';?>