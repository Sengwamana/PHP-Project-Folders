<?php
require '../../db/db_connect.php';

//for locations
if (isset($_GET['l_id'])) {
    $locationTable = new Table('locations');
    $data = [
        'location_id' => $_GET['l_id'],
        'location_archived' => $_GET['archive']
    ];
    $locationTable->saveInDatabase($data, 'location_id');
    $archiveText = $_GET['archive'] == "false" ? "?archived=true" : "";
    header('Location:view_locations' . $archiveText);
}

//for archiving and unarchiving classifications
if (isset($_GET['class_id'])) {
    $classTable = new Table('classifications');
    $data = [
        'class_id' => $_GET['class_id'],
        'class_archived' => $_GET['archive']
    ];
    $classTable->saveInDatabase($data, 'class_id');
    $archiveText = $_GET['archive'] == "false" ? "?archived=true" : "";
    header('Location:view_classifications' . $archiveText);
}

//for setting animal of the week
if (isset($_GET['set_an_week'])) {
    $animalWeekTable = new Table('animal_of_the_week');
    $data = [
        'animal_id' => $_GET['set_an_week']
    ];
    $animalWeekTable->insertInDatabase($data);
    header('Location:set_animal_of_the_week?msg=Animal of the week set');
}

//attending watchlist
if (isset($_GET['attend_watch'])) {
    $watchlistTable = new Table('watchlist');
    $data = [
        'watch_id' => $_GET['attend_watch'],
        'watch_attended' => $_GET['watch_value']
    ];
    $watchlistTable->saveInDatabase($data, 'watch_id');
    $attendText = $_GET['watch_value'] == "false" ? "&attended=true" : "";
    header('Location:view_animal_watchlist?msg=Operation Successful' . $attendText);
}

//archive vacancy
if (isset($_GET['vacancy_id'])) {
    $vacancyTable = new Table('vacancies');
    $data = [
        'vacancy_id' => $_GET['vacancy_id'],
        'v_archived' => 'true'
    ];
    $vacancyTable->saveInDatabase($data, 'vacancy_id');
    header('Location:view_vacancies?msg= Operation successful');
}

//archive employee
if (isset($_GET['ar_emp_id'])) {
    $empTable = new Table('employees');
    $data = [
        'e_id' => $_GET['ar_emp_id'],
        'e_archived' => $_GET['archive']
    ];
    $empTable->saveInDatabase($data, 'e_id');
    $archiveText = $_GET['archive'] == "false" ? "&archived=true" : "";
    header('Location:view_employees?msg=Operation successful' . $archiveText);
}

//archive visitors
if (isset($_GET['arc_vis_id'])) {
    $visitorTable = new Table('visitors');
    $data = [
        'visitor_id' => $_GET['arc_vis_id'],
        'v_archived' => $_GET['archive']
    ];
    $visitorTable->saveInDatabase($data, 'visitor_id');
    $attendText = $_GET['archive'] == "false" ? "&archived=true" : "";
    header('Location:view_visitors?msg=Operation Successful' . $attendText);
}

//review feedback
if (isset($_GET['rev_feed_id'])) {
    $feedTable = new Table('feedback');
    $data = [
        'feedback_id' => $_GET['rev_feed_id'],
        'f_reviewed' => 'true'
    ];
    $feedTable->saveInDatabase($data, 'feedback_id');
    header('Location:view_feedback?msg=Operation Successful');
}

//archive gallery
if (isset($_GET['gallery_id'])) {
    $galTable = new Table('gallery');
    $data = [
        'g_id' => $_GET['gallery_id'],
        'g_archived' => 'true'
    ];
    $galTable->saveInDatabase($data, 'g_id');
    header('Location:gallery?msg=Operation Successful');
}

//approve or reject sponsors
if (isset($_GET['spon_app_id'])) {
    $sponTable = new Table('sponsors');
    $data = [
        'sponsor_id' => $_GET['spon_app_id'],
        's_approved' => $_GET['type']
    ];
    $sponTable->saveInDatabase($data, 'sponsor_id');
    header('Location:view_sponsor_registrations?msg=Operation Successful');
}

//archive admin accounts
if (isset($_GET['arc_account_id'])) {
    $adminTable = new Table('admin');
    $adminTable->saveInDatabase([
        'admin_id' => $_GET['arc_account_id'],
        'ad_archived' => 'true'
    ], 'admin_id');
    header('Location:view_accounts?type=' . $_GET['arc_account_type'] . '&msg=Operation Successful');
}

//unarchive admin accounts
if (isset($_GET['unarc_account_id'])) {
    $adminTable = new Table('admin');
    $adminTable->saveInDatabase([
        'admin_id' => $_GET['unarc_account_id'],
        'ad_archived' => 'false'
    ], 'admin_id');
    header('Location:view_archived_accounts?msg=Operation Successful');
}

//archive events
if(isset($_GET['arc_event_id'])){
    $eventTable = new Table('events');
    $data = [
        'event_id' => $_GET['arc_event_id'],
        'event_archived' => $_GET['event_archive']
    ];
    $eventTable->saveInDatabase($data, 'event_id');
    $archiveText = $_GET['event_archive'] == "false" ? "&archived=true" : "";
    header('Location:view_events?msg=Operation successful' . $archiveText);
}

//review application
if (isset($_GET['review_app_id'])) {
    $appTable = new Table('applications');
    $vacancyTable = new Table('vacancies');
    $employeeTable = new Table('employees');

    if ($_GET['a_status'] == 'accepted') {
        // $data= [
        //     'vacancy_id' => $_GET['app_vacancy_id'],
        //     'a_status'=>'rejected'
        // ];
        // $appTable->saveInDatabase($data, 'application_id');

        $query1 = $pdo->prepare('UPDATE applications SET a_status=:a_status WHERE vacancy_id=:vacancy_id');
        $data = [
            'a_status' => 'rejected',
            'vacancy_id' => $_GET['app_vacancy_id']
        ];
        $query1->execute($data);

        $data2 = [
            'application_id' => $_GET['review_app_id'],
            'a_status' => 'accepted'
        ];
        $appTable->saveInDatabase($data2, 'application_id');

        $employeeTable->insertInDatabase([
            'application_id' => $_GET['review_app_id'],
            'vacancy_id' => $_GET['app_vacancy_id']
        ]);

        $vacancyTable->saveInDatabase([
            'vacancy_id' => $_GET['app_vacancy_id'],
            'v_status' => 'closed'
        ], 'vacancy_id');

        header('Location:view_applications?msg= Application accepted and employee added');
    }
    if ($_GET['a_status'] == 'rejected') {
        $data = [
            'application_id' => $_GET['review_app_id'],
            'a_status' => 'rejected'
        ];
        $appTable->saveInDatabase($data, 'application_id');
        header('Location:view_applications?msg=Application Rejected');
    }
}



//review application
if (isset($_GET['sa_id'])) {
    $sponAnTable = new Table('sponsored_animals');

    if ($_GET['sa_status'] == 'accepted') {
        $query1 = $pdo->prepare('UPDATE sponsored_animals SET s_status=:s_status WHERE animal_id=:animal_id');
        $data = [
            's_status' => 'rejected',
            'animal_id' => $_GET['sa_animal_id']
        ];
        $query1->execute($data);

        $data2 = [
            'sa_id' => $_GET['sa_id'],
            's_status' => 'accepted'
        ];
        $sponAnTable->saveInDatabase($data2, 'sa_id');

        header('Location:sponsor_animal_requests?msg= Sponsorship accepted');
    }
    if ($_GET['sa_status'] == 'rejected') {
        $data = [
            'sa_id' => $_GET['sa_id'],
            's_status' => 'rejected'
        ];
        $sponAnTable->saveInDatabase($data, 'sa_id');
        header('Location:sponsor_animal_requests?msg= Sponsorship rejected');
    }
}
