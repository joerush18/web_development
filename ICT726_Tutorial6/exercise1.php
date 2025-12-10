<?php
// Exercise 1: display count from 5 to 15 using a loop.
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>ICT726 Tutorial 6 - Exercise 1</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 32px; }
    h1 { margin-bottom: 12px; }
    .numbers { font-size: 18px; }
  </style>
</head>
<body>
  <h1>Count from 5 to 15 (PHP loop)</h1>
  <div class="numbers">
    <?php
      // You can switch to a while loop if preferred.
      for ($i = 5; $i <= 15; $i++) {
        echo $i . "<br>";
      }
    ?>
  </div>
</body>
</html>


