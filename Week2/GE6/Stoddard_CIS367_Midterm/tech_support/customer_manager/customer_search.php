<?php include 
'../view/header.php'; 

?>
<main>
    <h1>Customer Search</h1>
    <form action='index.php?customer_search' method="post">
        <label>Last Name: </label>
        <input type='hidden' name='action' value='getCustomer' />
        <input name='customerLastName' />
        <input type='submit' value='Search'/>
    </form>
    <section>
    <h2>
        Customer Details
    </h2>
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
    <tr>
        <td><?php echo $customer['firstName']?></td>
        <td><?php echo $customer['lastName']?></td>
        <td><?php echo $customer['address']?></td>
        <td><?php echo $customer['city']?></td>
        <td><?php echo $customer['state']?></td>
        <td><?php echo $customer['postalCode']?></td>
        <td><?php echo $customer['countryCode']?></td>
        <td><?php echo $customer['phone']?></td>
        <td><?php echo $customer['email']?></td>
        <td><?php echo $customer['PASSWORD']?></td>
        <td>
        <form action="index.php?customer_manager" method="post" id="updateCustomerForm">
            <input type="hidden" name="action" value="updateCustomer" />
            <input type="hidden" name="customerID" value="<?php echo $customer['lastName']?>" />
            <input type="submit" value="Update" /> 
        </form>
        <form action="." method="post" id="deleteCustomerForm" style="margin-top:5px">
            <input type="hidden" name="action" value="deleteCustomer" />
            <input type="hidden" name="customerID" value="<?php echo $customer['customerID'] ?>" />
            <input type="submit" value="Delete" /> 
        </form>
        </td> 
    </tr>   
</table>
</section>

    <h1>Add a new customer</h1>
    <form action='.'>
    <input type='hidden' name='action' value='addCustomerForm' />
    <input type='submit' value='Add Customer' />
    </form>
 
</main>
<?php include '../view/footer.php';?>


<br /><b>Notice

</b>:  Undefined variable: customer in <b>
C:\xampp\htdocs\ex_starts\Week3_GE1\tech_support\customer_manager\customer_update.php

</b> on line <b>23</b><br />