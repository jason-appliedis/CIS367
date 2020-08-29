<?php include '../view/header.php'; 
if(empty($customer)){
    $customer=array(
        "firstName" => "No customers found.",
        "lastName" => "",
        "address" => "",
        "city" => "",
        "state" => "",
        "postalCode" => "",
        "countryCode" => "",
        "phone" => "",
        "email" => "",
        "password" => "",
    );
    
}


?>

<main>
    <h1>Customer Search</h1>
    <form action='.' method="post">
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
        <td><?php echo $customer['password']?></td>
        <td>
        <form action="." method="post" id="updateCustomerForm">
            <input type="hidden" name="action" value="updateCustomer" />
            <input type="hidden" name="customerID" value="<?php echo $customer['lastName']?>" />
            <input type="submit" value="Update" /> 
        </form>
        </td> 
    </tr>   
</table>
</section>

    <h1>Addd a new customer</h1>
    <form action='.'>
    <input type='hidden' name='action' value='addCustomer' />
    <input type='submit' value='Add Customer' />
    </form>
</main>
<?php include '../view/footer.php';?>