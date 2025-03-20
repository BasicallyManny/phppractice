<?php
    require_once 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
        $task = $_POST['task'];
        $stmt = $conn->prepare("INSERT INTO tasks (task) VALUES (?)");
        $stmt->execute([$task]);

        header("Location: index.php");
    }
?>