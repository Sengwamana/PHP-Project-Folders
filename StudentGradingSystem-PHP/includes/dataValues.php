<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ensure the session is started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if matricNo is set in the session
if (isset($_SESSION['matricNo']) && !empty($_SESSION['matricNo'])) {
    $matricNo = $_SESSION['matricNo'];
} else {
    // Redirect to login page if not set
    header("Location: ../index.php");
    exit;
}

// Debug session data for verification (remove in production)
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// Database connection
include('dbconnection.php');

// Sanitize matricNo
$matricNo = mysqli_real_escape_string($con, $matricNo);

// Fetch student details
$query = "SELECT s.*, d.departmentName, f.facultyName
          FROM tblstudent s
          INNER JOIN tbldepartment d ON s.departmentId = d.Id
          INNER JOIN tblfaculty f ON s.facultyId = f.Id
          WHERE s.matricNo = '$matricNo'";

$result = mysqli_query($con, $query);
if ($row = mysqli_fetch_assoc($result)) {
    $departmentName = $row['departmentName'];
    $facultyName = $row['facultyName'];
} else {
    die("Error: No data found for the provided matric number.");
}
?>
