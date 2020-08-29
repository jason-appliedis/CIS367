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
    <input type="hidden" name="action" value="addCustomer" />
    <div class = 'grid-container'>
        <div>
            <label>First Name:</label>
        </div>
        <div>
            <input name='customerFirstName'/>  
        </div>
        <div>
            <?php echo $fields->getField('customerFirstName')->getHTML(); ?>
        </div>
        <div>
            <label>Last Name:</label>
        </div>
        <div>
            <input name='customerLastName'/>
        </div>
        <div>
            <?php echo $fields->getField('customerLastName')->getHTML(); ?>
        </div>
        <div>
            <label>Address:</label>
        </div>
        <div>
            <input name='customerAddress'/>
        </div>
        <div>
            <?php echo $fields->getField('customerAddress')->getHTML(); ?>
        </div>
        <div>    
            <label>City:</label>
        </div>
        <div>
            <input name='customerCity'/>
        </div>
        <div>
            <?php echo $fields->getField('customerCity')->getHTML(); ?>
        </div>
        <div>
            <label>State:</label>
        </div>
        <div>
            <input name='customerState'/>
        </div>
        <div>
            <?php echo $fields->getField('customerState')->getHTML(); ?>
        </div>
        <div>
            <label>Postal Code:</label>
        </div>
        <div>
            <input name='customerPostalCode'/>
        </div>
        <div>
            <?php echo $fields->getField('customerPostalCode')->getHTML(); ?>
        </div>
        <div>
            <label>Country:</label>
        </div>
        <div>
            <input name='customerCountryCode'/>
        </div>
        <div>
            <?php echo $fields->getField('customerCountryCode')->getHTML(); ?>
        </div>
        <div>
            <label>Phone:</label>
        </div>
        <div>
            <input name='customerPhone'/>
        </div>
        <div>
            <?php echo $fields->getField('customerPhone')->getHTML(); ?>
        </div>
        <div>
            <label>Email:</label>
        </div>
        <div>
            <input name='customerEmail'/>
        </div>
        <div>
            <?php echo $fields->getField('customerEmail')->getHTML(); ?>
        </div>
        <div>
            <label>Password:</label>
        </div>
        <div>
            <input name='customerPassword'/>
        </div>
        <div>
            <?php echo $fields->getField('customerPassword')->getHTML(); ?>
        </div>
        <div></div>
        <div>
            <input type='submit'value='Add Customer' style='width:50%' />
        </div>
        <div></div>
        
    <div>
</form>
<div>
    <a style='margin-top:10px' href=".">Search Customer</a>
</div>
</main>
<?php include '../view/footer.php'; ?>
