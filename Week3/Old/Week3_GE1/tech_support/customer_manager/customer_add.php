<?php include '../view/header.php'; ?>
<style>
    .grid-container {
        display: grid;
        justify-content: start;
        grid-template-columns: 100px 200px ;
        grid-gap: 10px 50px;
}
</style>
<main>
    <h1>Add/Update Customer</h1>
<div class = 'grid-container'>
    <div>
        <label>First Name:</label>
    </div>
    <div>
        <input />  
    </div>
    <div>
        <label>Last Name:</label>
    </div>
    <div>
        <input />
    </div>
    <div>
        <label>Address:</label>
    </div>
    <div>
        <input />
    </div>
    <div>    
        <label>City:</label>
    </div>
    <div>
        <input />
    </div>
    <div>
        <label>State:</label>
    </div>
    <div>
        <input />
    </div>
    <div>
        <label>Postal Code:</label>
    </div>
    <div>
        <input />
    </div>
    <div>
        <label>Country:</label>
    </div>
    <div>
        <input />
    </div>
    <div>
        <label>Phone:</label>
    </div>
    <div>
        <input />
    </div>
    <div>
        <label>Email:</label>
    </div>
    <div>
        <input />
    </div>
    <div>
        <label>Password:</label>
    </div>
    <div>
        <input />
    </div>
    <div></div>
    <div>
        <input type='submit' value='Add Cutomer' />
    </div>
    <div>
        <a style='margin-top:10px' href="index.php?action=searchCustomer">Search Customer</a>
    </div>
     
<div>
</main>
<?php include '../view/footer.php'; ?>
