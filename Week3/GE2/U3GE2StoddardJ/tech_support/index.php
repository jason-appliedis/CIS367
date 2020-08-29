<?php 
include 'view/header.php'; 
session_start([
    'cookie_lifetime' => 30 * 60
]);
?>
<main>
    <nav>
        
    <h2>Administrators</h2>
    <ul>
        <li><a href="product_manager">Manage Products</a></li>
        <li><a href="technician_manager">Manage Technicians</a></li>
        <li><a href="customer_manager">Manage Customers</a></li>
        <li><a href="under_construction.php">Create Incident</a></li>
        <li><a href="incident_list">Assign Incident</a></li>
        <li><a href="incident_list">Display Incidents</a></li>
    </ul>

    <h2>Technicians</h2>    
    <ul>
        <li><a href="under_construction.php">Update Incident</a></li>
    </ul>

    <h2>Customers</h2>
    <ul>
        <li><a href="under_construction.php">Register Product</a></li>
    </ul>
    
    </nav>
</section>
<?php include 'view/footer.php'; ?>
