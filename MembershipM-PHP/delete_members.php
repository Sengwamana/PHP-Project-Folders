<?php
// include('includes/config.php');

// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
//     $memberId = $_GET['id'];

//     $checkQuery = "SELECT * FROM members WHERE id = $memberId";
//     $checkResult = $conn->query($checkQuery);

//     if ($checkResult->num_rows > 0) {
//         $deleteQuery = "DELETE FROM members WHERE id = $memberId";

//         if ($conn->query($deleteQuery) === TRUE) {
//             header("Location: manage_members.php");
//             exit();
//         } else {
//             echo "Error deleting record: " . $conn->error;
//         }
//     } else {
//         header("Location: manage_members.php");
//         exit();
//     }
// } else {
//     header("Location: manage_members.php");
//     exit();
// }

// $conn->close();

include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $memberId = $_GET['id'];

    $checkRenewQuery = "SELECT * FROM renew WHERE member_id = $memberId";
    $checkRenewResult = $conn->query($checkRenewQuery);

    if ($checkRenewResult->num_rows > 0) {
        $deleteRenewQuery = "DELETE FROM renew WHERE member_id = $memberId";
        if ($conn->query($deleteRenewQuery) === FALSE) {
            echo "Error deleting related renew records: " . $conn->error;
            exit();
        }
    }

    $deleteMemberQuery = "DELETE FROM members WHERE id = $memberId";

    if ($conn->query($deleteMemberQuery) === TRUE) {
        header("Location: manage_members.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: manage_members.php");
    exit();
}

$conn->close();
?>