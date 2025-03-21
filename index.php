<?php
require_once 'db.php'; // Include database connection

try {
    if (!isset($conn)) {
        throw new Exception("Database connection not established.");
    }

    // Fetch tasks using MySQLi
    $result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");

    if (!$result) {
        throw new Exception($conn->error);
    }

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
        <?php if (empty($tasks)): ?>
            <li>No tasks found. Add a new task above!</li>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <li class="<?= isset($task['is_completed']) && intval($task['is_completed']) ? 'completed' : '' ?>">
                    <form action="updatetask.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
                        <input type="checkbox" onchange="this.form.submit()" <?= isset($task['is_completed']) && intval($task['is_completed']) ? 'checked' : '' ?>>
                    </form>
                    <?= htmlspecialchars($task['task']) ?>
                    <a href="deltask.php?id=<?= htmlspecialchars($task['id']) ?>" onclick="return confirm('Are you sure you want to delete this task?')">❌</a>
                    <a href="edittask.php?id=<?= htmlspecialchars($task['id']) ?>">✏️</a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>
