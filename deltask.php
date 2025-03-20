<?php
require_once 'db.php'; // Include database connection

try {
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id']; // Cast to integer for security
        
        $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id); // Use bind_param for MySQLi
        
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }
        
        $stmt->close();
        header("Location: index.php");
        exit(); // Important: terminate script after redirect
    } else {
        // No ID provided
        header("Location: index.php");
        exit();
    }
} catch (Exception $e) {
    die("Error deleting task: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8'));
}
?>