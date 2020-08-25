<?php

include '../view/header.php';
//get data base
//get data base
$technicians = [];
$technicians = Technician::getTechnicians();
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
<?php foreach ($technicians as $technician) { ?>
    <tr>
    <td><?php echo $technician->getTechFirstName(); ?></td>
    <td><?php echo $technician->getTechLastName(); ?></td>
    <td><?php echo $technician->getTechEmail(); ?></td>
    <td><?php echo $technician->getTechPhone(); ?></td>
    <td><?php echo $technician->getTechPassword(); ?></td>
    <td>
    <form action="." method="post" id="deleteTechnicianForm">
        <input type="hidden" name="action" value="deleteTechnician" />
        <input type="hidden" name="techID" value="<?php echo $technician->getTechID(); ?>" />
        <input type="submit" value="Delete" /> 
    </td>
    </tr>
<?php } ?>
</table>
<br>
<br>
  <form action="." method="post" id="showAddForm">
        <input type="hidden" name="action" value="technician_add" />
        <input class="buttonLink"type="submit" value="Add Technician" /> 
    </form>
</main>
<?php include '../view/footer.php'; ?>
