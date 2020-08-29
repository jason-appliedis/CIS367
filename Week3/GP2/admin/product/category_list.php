<?php 
include '../../view/header.php';
include '../../view/sidebar_admin.php';
?>

<section>
    <h1>Product Manager - Category List</h1>
    <table id="category_table">
        <tr>
            <th class='left'>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach($categories as $category) : ?>
        <tr>
            <td>
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </td>
            <td>
                <form class='delete_product_form'
                action='index.php' method='post'>
                <input type='hidden' name='action' value='delete_category'>
                <input type='hidden' name='category_id' 
                value="<?php echo $category['categoryID'];?>">
                <input type='submit' value='Delete'>

                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <form id='add_category_form' action='index.php' method='post'>
        <h1>Add Category</h1>
        <input type='hidden' name='action' value='add_category'>
        <input type='text' name='category_name' value='' >
        <input type='submit' name='Add'> 
    </form>
<section>