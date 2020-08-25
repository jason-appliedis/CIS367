<?php include '../view/header.php';
//get data base
//get data base

$customers = [];
$customers = Customer::getCustomers();
?>
<main>
<table>
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Postal Code</th>
    <th>Country Code</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Password</th>
    <th>&nbsp;</th>
</tr>
<!-- construct the table rows -->
<?php foreach ($customers as $customer) { ?>
    <tr>
        <td><?php echo $customer->getCustomerFirstName(); ?></td>
        <td><?php echo $customer->getCustomerLastName(); ?></td>
        <td><?php echo $customer->getcustomerAddress(); ?></td>
        <td><?php echo $customer->getCustomerCity(); ?></td>
        <td><?php echo $customer->getCustomerState(); ?></td>
        <td><?php echo $customer->getCustomerPostalCode(); ?></td>
        <td><?php echo $customer->getCustomerCountryCode(); ?></td>
        <td><?php echo $customer->getCustomerPhone(); ?></td>
        <td><?php echo $customer->getCustomerEmail(); ?></td>
        <td><?php echo $customer->getCustomerPassword(); ?></td>
        <td>
        <form action="." method="post" id="updateCutomerForm">
            <input type="hidden" name="action" value="updateCustomerForm" />
            <input type="hidden" name="customerLastName" value="<?php echo $customer->getCustomerLastName(); ?>" />
            <input type="submit" value="Update" /> 
        </form>
        <form action="." method="post" id="deleteCustomerForm" style="margin-top:5px">
            <input type="hidden" name="action" value="deleteCustomer" />
            <input type="hidden" name="customerID" value="<?php echo $customer->getCustomerID(); ?>" />
            <input type="submit" value="Delete" /> 
        </form>
        </td>
    </tr>
<?php } ?>
</table>
<br>
 <form action="." method="post" id="showAddForm">
        <input type="hidden" name="action" value="searchCustomer" />
        <input class="buttonLink"type="submit" value="Search Customer" /> 
    </form>
<br>
<br>
 <form action="." method="post" id="showAddForm">
        <input type="hidden" name="action" value="addCustomerForm" />
        <input class="buttonLink"type="submit" value="Add Customer" /> 
    </form>
</main>
<?php include '../view/footer.php'; ?>


