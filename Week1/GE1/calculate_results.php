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


$getErrMsg = validateEntry($investment, $interest_rate, $years);
// validate investment
// if an error message exists, go to the index page
if (count($getErrMsg) > 3) {
   include('index.php');
   exit();
}else{
   $formattedNumbers=formatNumbers($investment, $interest_rate, $years, $isCompounded);
   include('display_results.php');
}

?>