<?php
require_once("IntrestCalc.php");
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
// get the data from the form
$investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);

$interest_rate = filter_input(
   INPUT_POST,
   'interest_rate',
   FILTER_VALIDATE_FLOAT
);

$compoundedMonthly = filter_input(
   INPUT_POST,
   'compoundedMonthly'
);

$years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

$isCompounded = boolVal(isset($compoundedMonthly));
//construct the new class member
$futureVal = new IntrestCalc($investment, $interest_rate, $years, $isCompounded);

$getErrMsg = $futureVal->validateEntry();
// validate investment
echo count($getErrMsg);
echo "<br>";
// if an error message exists, go to the index page
if (count($getErrMsg) > 3) {
   include('index.php');
   exit();
}else{
    include('display_results.php');
}

?>