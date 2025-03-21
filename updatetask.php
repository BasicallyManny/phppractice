<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // If task name is provided, update the task name (without toggling completion)
    if (!empty($_POST['task'])) {
        $task_name = $_POST['task'];
        $stmt = $conn->prepare("UPDATE tasks SET task = ? WHERE id = ?");
        $stmt->bind_param("si", $task_name, $id);
    } 
    // If task name is NOT provided, it means the checkbox was checked (toggle completion)
    elseif (isset($_POST['toggle'])) {
        $stmt = $conn->prepare("UPDATE tasks SET is_completed = NOT is_completed WHERE id = ?");
        $stmt->bind_param("i", $id);
    }

    // Execute query if statement is set
    if (isset($stmt)) {
        $stmt->execute();
    }
}

// Redirect back to index
header("Location: index.php");
exit();
?>
