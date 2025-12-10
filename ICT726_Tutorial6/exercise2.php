<?php
// Exercise 2: Electricity bill calculator using conditional blocks.

function calculate_bill($units) {
  $cost = 0;

  if ($units <= 0) {
    return 0;
  }

  // First 50 units
  $first = min($units, 50);
  $cost += $first * 3.50;

  // Next 100 units (51-150)
  if ($units > 50) {
    $next = min($units - 50, 100);
    $cost += $next * 4.00;
  }

  // Next 100 units (151-250)
  if ($units > 150) {
    $next = min($units - 150, 100);
    $cost += $next * 5.20;
  }

  // Above 250
  if ($units > 250) {
    $cost += ($units - 250) * 6.50;
  }

  return $cost;
}

$units = '';
$bill = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $units = isset($_POST['units']) ? trim($_POST['units']) : '';

  if ($units === '' || !is_numeric($units)) {
    $error = "Please enter a numeric value for units.";
  } else {
    $units = floatval($units);
    if ($units < 0) {
      $error = "Units cannot be negative.";
    } else {
      $bill = calculate_bill($units);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>ICT726 Tutorial 6 - Electricity Bill</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 32px; }
    h1 { margin-bottom: 12px; }
    form { margin-top: 12px; }
    input { padding: 8px; }
    .result { margin-top: 16px; font-weight: bold; }
    .error { color: #b30000; margin-top: 12px; }
  </style>
</head>
<body>
  <h1>PHP - Calculate Electricity Bill</h1>

  <form action="" method="post" id="quiz-form">
    <input type="number" step="0.01" name="units" id="units"
           placeholder="Please enter Units" value="<?php echo htmlspecialchars($units); ?>" />
    <input type="submit" name="unit-submit" id="unit-submit" value="Submit" />
  </form>

  <?php if ($error): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
  <?php elseif ($bill !== null): ?>
    <div class="result">
      Units: <?php echo htmlspecialchars($units); ?><br>
      Bill amount: AUD <?php echo number_format($bill, 2); ?>
    </div>
  <?php endif; ?>
</body>
</html>


