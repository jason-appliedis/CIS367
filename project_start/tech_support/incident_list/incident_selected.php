<?php 
include '../view/header.php'; 

$technicians = array();
$technicians = Technician::getTechnicians();

?>
<main>
<table>
<tr>
    <th>Tech ID</th>
    <th>Technician</th>
    <th>Open Incidents</th>
    <th>&nbsp;</th>
</tr>
<!-- construct the table rows -->
<?php foreach ($technicians as $technician) {
    $techFirst = $technician->getTechFirstName();
    $techLast = $technician->getTechLastName();
    $techID = $technician->getTechID();
    $openIncidents = Incident::getOpenIncidents($techID);
    ?>
    <tr>
    <td><?php  echo $technician->getTechID() ?></td>
    <td><?php  echo "$techFirst $techLast"?></td>
    <td><?php  echo "$openIncidents" ?></td>
    <td>
    <form action="." method="post">
        <input type="hidden" name="action" value="assignIncident" />
        <input type="hidden" name="incidentId" value="<?php echo $incidentId ?>" />
        <input type="hidden" name="techID" value="<?php echo $techID ?>" />
        <input type="submit" value="Assign" /> 
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