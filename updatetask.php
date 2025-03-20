<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $stmt = $conn->prepare("UPDATE tasks SET is_completed = NOT is_completed WHERE id = ?");
    $stmt->execute([$_POST['id']]);
}

header("Location: index.php");
?>
