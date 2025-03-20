<?php
    require_once 'db.php'; // Include database connection

    if (isset($_GET['id'])) {
        $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        header("Location: index.php");
    }
?>