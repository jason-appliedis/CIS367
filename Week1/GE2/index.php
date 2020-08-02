<?php
define('ROOT_PATH', dirname(__DIR__) . '/GE2');

//set default value of variables for initial page load
if (!isset($investment)) {
  $investment = '';
}
if (!isset($interest_rate)) {
  $interest_rate = '';
}
if (!isset($years)) {
  $years = '';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Future Value Calculator</title>
    <style>
    <?php include ROOT_PATH . '/main.css';
    ?>
    </style>
</head>

<body>
    <main>
        <h1>Future Value Calculator</h1>
        <form action="calculate_results.php" method="post">

            <div id="data">
                <label>Investment Amount:</label>
                <input type="text" name="investment" value="<?php echo htmlspecialchars(
                  $investment
                ); ?>">
                <br>
                <?php if(!empty($getErrMsg['investment'])){ ?>
                <p class="errorMessage"><?php echo htmlspecialchars($getErrMsg['investment'])?></p>
                <?php } ?>



                <label>Yearly Interest Rate:</label>
                <input type="text" name="interest_rate" value="<?php echo htmlspecialchars(
                  $interest_rate
                ); ?>">
                <br>
                <?php if(!empty($getErrMsg['interest_rate'])){ ?>
                <p class="errorMessage"><?php echo htmlspecialchars($getErrMsg['interest_rate']);?></p>
                <?php } ?>


                <label>Number of Years:</label>
                <input type="text" name="years" value="<?php echo htmlspecialchars(
                  $years
                ); ?>">
                <br>
                <?php if(!empty($getErrMsg['years'][0])){ ?>
                <p class="errorMessage"><?php echo htmlspecialchars($getErrMsg['years']);?></p>
                <?php } ?>
                <label>Compound Monthhly:</label>
                <input type="checkbox" class="checkBox" name="compoundedMonthly" value=true />
                <br>
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calculate"><br>
            </div>

        </form>
    </main>
</body>

</html>