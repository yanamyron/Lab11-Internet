<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        input[type="button"] {
            width: 50px;
            height: 50px;
            font-size: 20px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <form method="get" action="">
            <div class="form-group">
                <label for="x">Значення x:</label>
                <input type="text" class="form-control" id="x" name="x">
            </div>
            <div class="form-group">
                <label for="y">Значення y:</label>
                <input type="text" class="form-control" id="y" name="y">
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        <?php
        if(isset($_GET['x']) && isset($_GET['y'])) {
            $x = $_GET['x'];
            $y = $_GET['y'];
            echo "<p>При x=$x і y=$y</p>";
            $z = sin($x) + acos($y) - sqrt($x * $y);
            echo "<p>Результат становить $z</p>";
        }
        ?>
        
        <input type="text" id="result" class="form-control" disabled>
        <br>
        <input type="button" value="1" onclick="appendNumber('1')" class="btn btn-primary">
        <input type="button" value="2" onclick="appendNumber('2')" class="btn btn-primary">
        <input type="button" value="3" onclick="appendNumber('3')" class="btn btn-primary">
        <input type="button" value="+" onclick="appendOperator('+')" class="btn btn-primary">
        <br>
        <input type="button" value="4" onclick="appendNumber('4')" class="btn btn-primary">
        <input type="button" value="5" onclick="appendNumber('5')" class="btn btn-primary">
        <input type="button" value="6" onclick="appendNumber('6')" class="btn btn-primary">
        <input type="button" value="-" onclick="appendOperator('-')" class="btn btn-primary">
        <br>
        <input type="button" value="7" onclick="appendNumber('7')" class="btn btn-primary">
        <input type="button" value="8" onclick="appendNumber('8')" class="btn btn-primary">
        <input type="button" value="9" onclick="appendNumber('9')" class="btn btn-primary">
        <input type="button" value="*" onclick="appendOperator('*')" class="btn btn-primary">
        <br>
        <input type="button" value="0" onclick="appendNumber('0')" class="btn btn-primary">
        <input type="button" value="." onclick="appendDot()" class="btn btn-primary">
        <input type="button" value="=" onclick="calculate()" class="btn btn-primary">
        <input type="button" value="/" onclick="appendOperator('/')" class="btn btn-primary">
        <br>
        <input type="button" value="C" onclick="clearResult()" class="btn btn-danger">
    </div>

    <script>
        function appendNumber(number) {
            document.getElementById('result').value += number;
        }
        
        function appendOperator(operator) {
            let result = document.getElementById('result').value;
            let lastChar = result[result.length - 1];
            if (lastChar !== '+' && lastChar !== '-' && lastChar !== '*' && lastChar !== '/') {
                document.getElementById('result').value += operator;
            }
        }
        
        function appendDot() {
            let result = document.getElementById('result').value;
            let lastNumber = result.split(/[\+\-\*\/]/).pop();
            if (!lastNumber.includes('.')) {
                document.getElementById('result').value += '.';
            }
        }
        
        function calculate() {
            let expression = document.getElementById('result').value;
            let result = eval(expression);
            document.getElementById('result').value = result;
        }
        
        function clearResult() {
            document.getElementById('result').value = '';
        }
    </script>
</body>
</html>
