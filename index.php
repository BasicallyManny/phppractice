<?php
session_start();

// Handle logout
if (isset($_POST['logout'])) {
    session_unset();  // Clear session variables
    session_destroy(); // Destroy session

    // Redirect back to the login page
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>This is the Login Page</h1>

    <?php
    // Show logout message if it exists
    if (isset($_SESSION['logout_message'])) {
        echo "<p>" . $_SESSION['logout_message'] . "</p>";
        unset($_SESSION['logout_message']); // Clear the message after displaying
    }

    if (isset($_POST['login'])) {
        // Get input values safely
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST['password']; // Should be hashed if stored in a database

        // Store username in session (but NOT password)
        $_SESSION['username'] = $username;

        echo "<p>Login successful! Welcome, " . $_SESSION['username'] . ".</p>";
    }
    ?>

    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit" name="login">Login</button>
    </form>

    <form action="" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
