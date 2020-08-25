<?php
$fromPHP = "Helo From PHP with react";
$user = (object) [
  'name' => 'Jason Stoddard',
  'email' => 'jassto@students.ecpi.edu',
  'logged' => true,
];
?>

<!doctype html>
<html lang="en">

<head>
    <title>React PHP starter Kit</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/app/assets/css/app.css" type="text/css">
</head>
<script type="text/javascript">
var myApp = {
    user: < ? php echo json_encode($user); ? > ,
    logged : < ? php echo $user - > logged; ? >
};
</script>

<body>

    <div id="app"></div>

    <script type="text/javascript" src="/app/assets/bundle/main.bundle.js"></script>

</body>

</html>