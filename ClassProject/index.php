<?php 
include 'view/container/header.php'; 
$viewPath = '';
print_r( $_POST);

// if(isset($_POST['shoppingCart']) || isset($_POST['products']) ||isset($_POST['registration']) ){
//    switch($_POST['shoppingCart']){
//       case 'shoppingCart' :
//          $viewPath = 'view/shoppingcart.php';
//          break;
//       case 'products' :
//          $viewPath = 'view/products.php';
//          break;
//       case 'registration' :
//          $viewPath = 'view/registration.php';
//          break;
//    }
// }




// function setView($pathToLoad = '/'){
//    $viewPath = $pathToLoad;
// }
// include($viewPath);
?>
<main>
    <nav>
    <h2>Company XYZ</h2>
    <form method="post">
      <input type="submit" value="Shopping Cart" name="shoppingCart" />
      <input type="submit" value="Products" name="products" />
      <input type="submit" value="Registration" name="registration" />
    </form>
      <ul>
         <li></li>
         <li><a href="view/products.php">Manage Technicians</a></li>
         <li><a href="view/registration.php">Manage Customers</a></li>
         
      </ul>
   </nav>
   <main>
      <?php 
         if($viewPath !== ''){
            include($viewPath);
         }
      ?>
   </main>
</section>
<?php include 'view/container/footer.php';?> 