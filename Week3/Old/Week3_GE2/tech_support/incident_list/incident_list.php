<?php include '../view/header.php'; ?>
<?php 

//get data base
$incidentsNotAssigned = array();
$incidentsNotAssigned =  Incident::getUnAssignedIncidents();

?>
<main>
<table>
<tr>
    <th>Customer</th>
    <th>Product</th>
    <th>Date Opened</th>
    <th>Title</th>
    <th>Description</th>
    <th>&nbsp;</th>
</tr>
<!-- construct the table rows -->
<?php foreach ($incidentsNotAssigned as $incidentListItem) {
    $customerFirstName = $incidentListItem->getIncidentCustomerFirstName();
    $customerLastName = $incidentListItem->getIncidentCustomerLastName();

    ?>
    <tr>
    <td><?php  echo "$customerFirstName $customerLastName" ?></td>
    <td><?php  echo $incidentListItem->getIncidentProductCode() ?></td>
    <td><?php  echo $incidentListItem->getIncidentDateOpened() ?></td>
    <td><?php  echo $incidentListItem->getIncidentTitle() ?></td>
    <td><?php  echo $incidentListItem->getIncidentDescription() ?></td>
    <td>
    <form action="." method="post">
        <input type="hidden" name="action" value="selectIncident" />
        <input type="hidden" name="incidentId" value="<?php echo $incidentListItem->getIncidentId() ?>" />
        <input type="submit" value="Select" /> 
        </form>
    </td>
    </tr>
<?php
}
?>
</table>
<br>
</main>
<?php include '../view/footer.php';?>