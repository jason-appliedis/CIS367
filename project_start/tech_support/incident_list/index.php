<?php
require('../model/database.php');
require('../model/incident.php');
require('../model/technician.php');
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action === NULL){
            $action='incident_list';
    }
}
switch($action){
    case 'under_construction':
        include('../under_construction.php');
        break;
    case 'incident_list':
        include('./incident_list.php');
        break;
    case 'selectIncident':
        $incidentId = filter_input(INPUT_POST, 'incidentId');
        include('./incident_selected.php');
    break;
    case 'assignIncident':
        $incidentId = filter_input(INPUT_POST, 'incidentId');
        $techId = filter_input(INPUT_POST, 'techID');
        include('./incident_assign.php');
    break;
    case 'saveAssignment':
        $incidentId = filter_input(INPUT_POST, 'incidentId');
        $techId = filter_input(INPUT_POST, 'techID');
        Incident::assignIncident($incidentId,$techId);
        include('./confirm_assign.php');
    break;
}
?>
