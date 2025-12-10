<?php
// Exercise 3: Simple calculator using switch-case.

$num1 = '';
$num2 = '';
$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $num1 = isset($_POST['num1']) ? trim($_POST['num1']) : '';
  $num2 = isset($_POST['num2']) ? trim($_POST['num2']) : '';
  $op   = isset($_POST['op']) ? $_POST['op'] : '';

  if ($num1 === '' || $num2 === '' || !is_numeric($num1) || !is_numeric($num2)) {
    $error = "Please enter valid numbers in both fields.";
  } else {
    $a = floatval($num1);
    $b = floatval($num2);

    switch ($op) {
      case 'add':
        $result = $a + $b;
        break;
      case 'sub':
        $result = $a - $b;
        break;
      case 'mul':
        $result = $a * $b;
        break;
      case 'div':
        if ($b == 0) {
          $error = "Cannot divide by zero.";
        } else {
          $result = $a / $b;
        }
        break;
      default:
        $error = "Choose an operation.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>ICT726 Tutorial 6 - PHP Calculator</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 32px; }
    h1 { margin-bottom: 12px; }
    form { margin-top: 12px; }
    input { padding: 8px; margin: 4px 0; }
    button { padding: 8px 12px; margin-right: 8px; }
    .result { margin-top: 16px; font-weight: bold; }
    .error { color: #b30000; margin-top: 12px; }
  </style>
</head>
<body>
  <h1>PHP Calculator (switch-case)</h1>

  <form action="" method="post">
    <div>
      <input type="text" name="num1" placeholder="First number"
             value="<?php echo htmlspecialchars($num1); ?>" />
    </div>
    <div>
      <input type="text" name="num2" placeholder="Second number"
             value="<?php echo htmlspecialchars($num2); ?>" />
    </div>
    <div style="margin-top:8px;">
      <button type="submit" name="op" value="add">Add</button>
      <button type="submit" name="op" value="sub">Subtract</button>
      <button type="submit" name="op" value="mul">Multiply</button>
      <button type="submit" name="op" value="div">Divide</button>
    </div>
  </form>

  <?php if ($error): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
  <?php elseif ($result !== null): ?>
    <div class="result">
      Result: <?php echo $result; ?>
    </div>
  <?php endif; ?>
</body>
</html>


