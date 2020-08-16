<?php
$helloFromPhP = 'PHP';
$user = (object) [
  'name' => 'Jason Stoddard',
  'email' => 'jassto1821@students.ecpi.ecu',
  'logged' => true,
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIS367 Shopping Cart</title>

    <script type="text/javascript">
    let myApp = {
        user: <?php echo json_encode($user); ?> ,
        logged : <?php echo $user->logged; ?>
    };
    </script>
</head>

<body>
    <div id='root'></div>
    <script type='text/javascript' src='./client/dist/bundle.js'></script>
</body>

</html>