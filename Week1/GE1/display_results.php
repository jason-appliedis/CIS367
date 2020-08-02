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
        <span><?php echo $formattedNumbers['investment_f']; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $formattedNumbers['yearly_rate_f']; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $formattedNumbers['future_value_f']; ?></span><br>

        <label>Compounded Monthly:</label>
        <span><?php  echo $isCompounded ? 'Yes' : 'No'?></span><br>

        <section>
            <p>This calculation was done on <?php echo htmlspecialchars(__getCalculationDate()); ?>
        </section>

        <section>
            <a href="<?php echo '.'; ?>">Go Back</a>
        </section>

    </main>
</body>

</html>