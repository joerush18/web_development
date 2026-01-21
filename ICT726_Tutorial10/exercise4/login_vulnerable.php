<?php
declare(strict_types=1);

require __DIR__ . '/config.php';

$message = '';
$isSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Intentionally vulnerable: raw user input is concatenated into SQL.
    $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
    $result = $pdo->query($sql);
    $user = $result ? $result->fetch() : false;

    if ($user) {
        $isSuccess = true;
        $message = 'Login successful (vulnerable form).';
    } else {
        $message = 'Login failed. Try again.';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vulnerable Login</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <main>
      <h1>Vulnerable Login</h1>
      <p>This form is intentionally vulnerable to SQL injection.</p>

      <section class="card">
        <form method="post" action="">
          <label for="username">Username</label>
          <input id="username" name="username" type="text" required />

          <label for="password">Password</label>
          <input id="password" name="password" type="password" required />

          <button type="submit">Login</button>
        </form>
      </section>

      <?php if ($message !== ''): ?>
        <div class="result <?php echo $isSuccess ? 'success' : 'error'; ?>">
          <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
        </div>
      <?php endif; ?>

      <p><a href="index.php">Back to exercise 4</a></p>
    </main>
  </body>
</html>
