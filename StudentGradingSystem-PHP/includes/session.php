<?php
include('dbconnection.php');
session_start();

// Redirect to login page function
function redirectToLogin() {
    echo "<script type=\"text/javascript\">
    alert('Session expired or not authenticated. Redirecting to login.');
    window.location = '../index.php';
    </script>";
    exit;
}

// Check if user is logged in
if (isset($_SESSION['staffId'])) {
    $staffId = $_SESSION['staffId'];
    echo "Logged in as Staff ID: $staffId";
} elseif (isset($_SESSION['matricNo'])) {
    $matricNo = $_SESSION['matricNo'];
    echo "Logged in as Matric No: $matricNo";
} else {
    echo "Session variables not set! Redirecting...";
    redirectToLogin();
}

// Session expiry logic (30-minute timeout)
$expiry = 1800; // 30 minutes
if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {
    session_unset();
    session_destroy();
    redirectToLogin();
}
$_SESSION['LAST'] = time();
?>
