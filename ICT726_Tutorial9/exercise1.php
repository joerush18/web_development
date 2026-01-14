<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1: Inverse Calculation with Exception Handling</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #5568d3;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            font-size: 16px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .info {
            margin-top: 15px;
            padding: 10px;
            background-color: #e7f3ff;
            border-radius: 5px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculate Inverse of a Number</h1>
        
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="number">Enter a number:</label>
                <input type="number" id="number" name="number" step="any" required autofocus>
            </div>
            <button type="submit" name="submit">OK</button>
        </form>
        
        <?php
        /**
         * Exercise 1: Exception Handling
         * ICT726 Tutorial 9
         * 
         * This program calculates the inverse of a number (1/X)
         * and throws an exception if the user enters zero.
         */
        
        /**
         * Function to calculate the inverse of a number
         * @param float $number The number to calculate inverse for
         * @return float The inverse of the number (1/$number)
         * @throws Exception If number is zero
         */
        function calculateInverse($number) {
            if ($number == 0) {
                throw new Exception("Division by zero is not allowed");
            }
            return 1 / $number;
        }
        
        // Process form submission
        if (isset($_POST['submit'])) {
            $inputNumber = $_POST['number'];
            
            // Use try-catch block to handle exceptions
            try {
                $result = calculateInverse($inputNumber);
                echo "<div class='result success'>";
                echo "<strong>Result:</strong><br>";
                echo "The inverse of <strong>$inputNumber</strong> is <strong>$result</strong><br>";
                echo "Calculation: 1 / $inputNumber = $result";
                echo "</div>";
            } catch (Exception $e) {
                echo "<div class='result error'>";
                echo "<strong>Error:</strong> " . $e->getMessage();
                echo "</div>";
            }
        }
        ?>
        
        <div class="info">
            <strong>Instructions:</strong><br>
            Enter any number to calculate its inverse (1/X).<br>
            If you enter zero, an exception will be thrown.
        </div>
    </div>
</body>
</html>
