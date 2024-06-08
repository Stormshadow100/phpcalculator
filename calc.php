<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px auto;
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Simple Calculator</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" id="num1" required><br><br>
        <label for="num2">Number 2:</label>
        <input type="number" name="num2" id="num2" required><br><br>
        <label for="operation">Operation:</label>
        <select name="operation" id="operation">
            <option value="add">Addition</option>
            <option value="sub">Subtraction</option>
            <option value="mul">Multiplication</option>
            <option value="div">Division</option>
            <option value="pow">Exponentiation</option>
            <option value="percent">Percentage</option>
            <option value="sqrt">Square Root</option>
        </select><br><br>
        <input type="submit" value="Calculate">
    </form>

</body>
</html>

<?php
    $num1 = isset($_POST["num1"]) ? $_POST["num1"] : null;  // Handle missing input
    $num2 = isset($_POST["num2"]) ? $_POST["num2"] : null;  // Handle missing input
    $operation = $_POST["operation"];
    $base = isset($_POST["base"]) ? $_POST["base"] : 10;  // Optional base for logarithm

    function calculate($num1, $num2, $operation) {
        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "sub":
                $result = $num1 - $num2;
                break;
            case "mul":
                $result = $num1 * $num2;
                break;
            case "div":
                if ($num2 == 0) {
                    $result = "Error: Cannot divide by zero";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            case "pow":
                $result = pow($num1, $num2);
                break;
            case "percent":
                $result = percentage($num1, $num2);
                break;
            case "sqrt":
                $result = sqrt($num1);
                break;

        }
        return $result;
    }

    function percentage($value, $number) {
        return ($value / 100) * $number;
    }

    if (isset($num1) && isset($operation)) {  // Check for minimum required input
        $result = calculate($num1, $num2, $operation);
        echo "Result: $result";
    } else {
        echo "Error: Please enter a number and select an operation.";
    }
?>
