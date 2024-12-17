<?php
include('includes/config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $delete_id = $_GET['id'] ?? null;

    $deleteQuery = "DELETE FROM membership_types WHERE id = $delete_id";

    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
        exit();
    }
} else {
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>
