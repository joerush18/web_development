<?php
declare(strict_types=1);

require __DIR__ . '/config.php';

$message = '';
$isSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'username' => $username,
        'password' => $password,
    ]);
    $user = $stmt->fetch();

    if ($user) {
        $isSuccess = true;
        $message = 'Login successful (secure form).';
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
    <title>Secure Login</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <main>
      <h1>Secure Login</h1>
      <p>This form uses prepared statements to prevent SQL injection.</p>

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
