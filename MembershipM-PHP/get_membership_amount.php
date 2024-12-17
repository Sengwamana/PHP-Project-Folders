<?php
include('includes/config.php');

header('Content-Type: application/json');


$response = array('success' => false, 'amount' => 0, 'message' => '');

if (isset($_GET['membershipTypeId'])) {
    $membershipTypeId = $_GET['membershipTypeId'];
    
    error_log('Received membership type ID: ' . $membershipTypeId);

    $membershipTypeQuery = "SELECT amount FROM membership_types WHERE id = $membershipTypeId";
    $membershipTypeResult = $conn->query($membershipTypeQuery);

    if ($membershipTypeResult) {
        $row = $membershipTypeResult->fetch_assoc();
        $response['success'] = true;
        $response['amount'] = $row['amount'];
    } else {
        $response['message'] = 'Error fetching membership type amount: ' . $conn->error;
    }
} else {
    $response['message'] = 'Membership type ID not provided.';
}

error_log('AJAX Response: ' . json_encode($response));

echo json_encode($response);
?>