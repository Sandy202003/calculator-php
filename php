<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Multipurpose Calculator</title>
</head>
<body>
    <div class="calculator">
        <h1>Multipurpose Calculator</h1>
        <form action="calculator.php" method="post">
            <input type="number" name="num1" required placeholder="First Number" step="any">
            <input type="number" name="num2" placeholder="Second Number" step="any">
            <select name="operation" required>
                <option value="">Select Operation</option>
                <option value="add">Addition</option>
                <option value="subtract">Subtraction</option>
                <option value="multiply">Multiplication</option>
                <option value="divide">Division</option>
                <option value="exponent">Exponentiation</option>
                <option value="percentage">Percentage</option>
                <option value="sqrt">Square Root</option>
                <option value="log">Logarithm</option>
            </select>
            <button type="submit">Calculate</button>
        </form>
    </div>
</body>
</html>

<?php
function calculate($num1, $num2, $operation) {
    switch ($operation) {
        case 'add':
            return $num1 + $num2;
        case 'subtract':
            return $num1 - $num2;
        case 'multiply':
            return $num1 * $num2;
        case 'divide':
            return $num2 != 0 ? $num1 / $num2 : 'Error: Division by zero';
        case 'exponent':
            return pow($num1, $num2);
        case 'percentage':
            return ($num1 / 100) * $num2;
        case 'sqrt':
            return sqrt($num1);
        case 'log':
            return log($num1);
        default:
            return 'Invalid operation';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = floatval($_POST['num1']);
    $num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : null;
    $operation = $_POST['operation'];

    $result = calculate($num1, $num2, $operation);
    echo "<h1>Result: $result</h1>";
    echo "<a href='index.php'>Back</a>";
}
?>
