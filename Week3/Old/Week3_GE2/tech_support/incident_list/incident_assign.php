<?php include '../view/header.php'; ?>
<?php 

//get data base
$incident = array();
$incident =  Incident::getIncident($incidentId);
?>
<style>
.grid-container {
  display: grid;
  grid-template-columns: 150px 300px;
  padding: 10px;
}
</style>
<main>

<h1>Assign Incident</h1>
<div class="grid-container">
  <div class="grid-item">
  Customer:
  </div>
  <div class="grid-item">
  <?php 
  $customerFirstName = $incident->getIncidentCustomerFirstName();
  $customerLastName = $incident->getIncidentCustomerLastName();
  echo "$customerFirstName $customerLastName";
  ?>
  </div>
  <div class="grid-item">
  Product:
  </div>  
  <div class="grid-item">
  <?php
    echo $incident->getIncidentProductCode();
  ?>
  </div>
  <div class="grid-item">
  Technician
  </div>
  <div class="grid-item">
  <?php  
    $technician = Technician::getTech($techId);
    $techFirstName = $technician['firstName'];
    $techLastName = $technician['lastName'];
    echo "$techFirstName $techLastName";
  ?>
  </div>  
</div>


    <form action="" method="post">
        <input type="hidden" name="action" value="saveAssignment" />
        <input type="hidden" name="incidentId" value="<?php echo $incidentId ?>" />
        <input type="hidden" name="techID" value="<?php echo $techId ?>" />
        <input type="submit" value="Assign" /> 
    </form>

<br>
</main>
<?php include '../view/footer.php';?>