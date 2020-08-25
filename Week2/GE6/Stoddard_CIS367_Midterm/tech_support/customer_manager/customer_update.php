<?php include '../view/header.php'; ?>
<style>
    .grid-container {
        display: grid;
        justify-content: start;
        grid-template-columns: 150px 300px 300px;
        grid-gap: 10px 50px;
}
.grid-container > div >   input {
    width:100%;
}
</style>
<main>
   
    <h1>Add/Update Customer</h1>
<form  method="post" id="deleteCustomerForm">
    <input type="hidden" name="action" value="updateCustomer" />
    <input type="hidden" name="customerID" value=<?php echo htmlspecialchars($customer['customerID'])?> />
    <div class = 'grid-container'>
        <div>
            <label>First Name:</label>
        </div>
        <div>
            <input name='customerFirstName'
            value='<?php echo htmlspecialchars($customer['firstName'])?>'
            />  
        </div>
        <div>
            <?php echo $fields->getField('customerFirstName')->getHTML(); ?>
        </div>
        <div>
            <label>Last Name:</label>
        </div>
        <div>
            <input name='customerLastName'
            value='<?php echo htmlspecialchars($customer['lastName'])?>'
            />
        </div>
        <div>
            <?php echo $fields->getField('customerLastName')->getHTML(); ?>
        </div>
        <div>
            <label>Address:</label>
        </div>
        <div>
            <input name='customerAddress' 
            value='<?php echo htmlspecialchars($customer['address'])?>'
            />
        </div>
        <div>
            <?php echo $fields->getField('customerAddress')->getHTML(); ?>
        </div>
        <div>    
            <label>City:</label>
        </div>
        <div>
            <input name='customerCity' 
            value='<?php echo htmlspecialchars($customer['city'])?>'/>
        </div>
        <div>
            <?php echo $fields->getField('customerCity')->getHTML(); ?>
        </div>
        <div>
            <label>State:</label>
        </div>
        <div>
            <input name='customerState'
            value='<?php echo htmlspecialchars($customer['state'])?>'
            />
        </div>
        <div>
            <?php echo $fields->getField('customerState')->getHTML(); ?>
        </div>
        <div>
            <label>Postal Code:</label>
        </div>
        <div>
            <input name='customerPostalCode'
            value='<?php echo htmlspecialchars($customer['postalCode'])?>'
            />
        </div>
        <div>
            <?php echo $fields->getField('customerPostalCode')->getHTML(); ?>
        </div>
        <div>
            <label>Country:</label>
        </div>
        <div>
            <input name='customerCountryCode'
            value='<?php echo htmlspecialchars($customer['countryCode'])?>'
            />
        </div>
        <div>
            <?php echo $fields->getField('customerCountryCode')->getHTML(); ?>
        </div>
        <div>
            <label>Phone:</label>
        </div>
        <div>
            <input name='customerPhone'
            value='<?php echo htmlspecialchars($customer['phone'])?>'
            />
        </div>
        <div>
            <?php echo $fields->getField('customerPhone')->getHTML(); ?>
        </div>
        <div>
            <label>Email:</label>
        </div>
        <div>
            <input name='customerEmail'
            value='<?php echo htmlspecialchars($customer['email'])?>'
            />
        </div>
        <div>
            <?php echo $fields->getField('customerEmail')->getHTML(); ?>
        </div>
        <div>
            <label>Password:</label>
        </div>
        <div>
            <input name='customerPassword'
            value='<?php echo htmlspecialchars($customer['PASSWORD'])?>'
            />
        </div>
        <div>
            <?php echo $fields->getField('customerPassword')->getHTML(); ?>
        </div>
        <div></div>
        <div>
            <input type='submit'value='Update Customer' style='width:50%' />
        </div>
        <div></div>
        
    <div>
</form>
<div>
    <a style='margin-top:10px' href="index.php?action=searchCustomer">Search Customer</a>
</div>
</main>
<?php include '../view/footer.php'; ?>
