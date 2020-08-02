<!DOCTYPE html>
<html>

<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="./main.css">
</head>

<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $futureVal->__getFormatNumbers()['investment_f']; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $futureVal->__getFormatNumbers()['yearly_rate_f']; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $futureVal->__getNumberOfYears(); ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $futureVal->__getFormatNumbers()['future_value_f']; ?></span><br>

        <label>Compounded Monthly:</label>
        <span><?php echo $futureVal->__getCompoundedMonthly(); ?></span><br>

        <section>
            <p>This calculation was done on <?php echo htmlspecialchars(
               $futureVal->__getCalculationDate()
            ); ?>
        </section>

        <section>
            <a href="<?php echo '.'; ?>">Go Back</a>
        </section>

    </main>
</body>

</html>