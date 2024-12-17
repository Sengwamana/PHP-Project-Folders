<?php

$ticketTable = new Table('tickets');
if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    $totalPrice = $_POST['regular_num'] * 6 + $_POST['child_num'] * 2 + $_POST['student_num'] * 3;
    if ($totalPrice == 0) {
        header('Location:ticket_page?msg=Booking failed. You must select at least one ticket&type=danger');
    } else {
        $_POST['visitor_id'] = $_SESSION['visitor_id'];
        $ticketTable->insertInDatabase($_POST);
        header('Location:ticket_page?msg=Ticket booked successfully!! Your total price is: $' . $totalPrice . '&type=success');
    }
}

$title = "Zoo - Ticket";
$content = loadTemplate('../templates/ticket_page_template.php', []);
