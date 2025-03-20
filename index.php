<?php
require_once 'db.php'; // Include database connection

try {
    // Fetch tasks using MySQLi
    $result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");

    // Fetch all rows as an associative array
    $tasks = $result->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    die("Database error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>To-Do List</h2>
    
    <form action="addtask.php" method="POST">
        <input type="text" name="task" required placeholder="Enter a new task">
        <button type="submit">Add Task</button>
    </form>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= htmlspecialchars($task['task'], ENT_QUOTES, 'UTF-8') ?>
                <a href="deltask.php?id=<?= urlencode($task['id']) ?>">❌</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
