<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit" name="login">Login</button>
    </form>

    <?php
    if (isset($_POST['login'])) {
        // Get input values safely
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        // Dummy credentials (Replace with database check)
        $valid_username = "admin";
        $valid_password = "12345"; // In real apps, use password hashing

        // Verify login credentials
        if ($username === $valid_username && $password === $valid_password) {
            echo "<p>✅ Login successful! Welcome, <strong>$username</strong>.</p>";
        } else {
            echo "<p>❌ Invalid username or password.</p>";
        }
    }
    ?>
</body>
</html>
