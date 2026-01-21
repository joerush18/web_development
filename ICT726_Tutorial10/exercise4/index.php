<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Exercise 4 - SQL Injection Demo</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <main>
      <h1>Exercise 4: SQL Injection Demo</h1>

      <section class="card">
        <h2>Setup</h2>
        <ol>
          <li>Create a database in MySQL named <code>ict726_security</code>.</li>
          <li>Run the SQL in <code>init.sql</code> to create the table and sample users.</li>
          <li>
            Update database credentials in <code>config.php</code> if needed.
          </li>
        </ol>
      </section>

      <section class="card warning">
        <h2>Warning</h2>
        <p>
          The vulnerable form is intentionally insecure for learning purposes.
          Do not use this pattern in real applications.
        </p>
      </section>

      <section class="card">
        <h2>Try the vulnerable form</h2>
        <p>Use the sample user <strong>student</strong> / <strong>password123</strong>.</p>
        <p>
          Example SQL injection input (for username):
          <code>' OR '1'='1</code>
        </p>
        <p><a href="login_vulnerable.php">Open vulnerable login</a></p>
      </section>

      <section class="card">
        <h2>Try the secure form</h2>
        <p>
          This version uses prepared statements to prevent SQL injection.
        </p>
        <p><a href="login_secure.php">Open secure login</a></p>
      </section>

      <p><a href="../index.html">Back to tutorial index</a></p>
    </main>
  </body>
</html>
