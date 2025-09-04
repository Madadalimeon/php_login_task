<?php
include('config.php');

// Check if ID is passed
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Delete query
    $sql = "DELETE FROM users WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: userlist.php?msg=User deleted successfully");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid Request";
}
?>
