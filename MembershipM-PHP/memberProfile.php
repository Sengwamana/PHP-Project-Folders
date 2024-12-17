<?php
include('includes/config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $memberId = $_GET['id'];

    $selectQuery = "SELECT members.*, membership_types.type AS membership_type_name
                    FROM members
                    JOIN membership_types ON members.membership_type = membership_types.id
                    WHERE members.id = $memberId";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        $memberDetails = $result->fetch_assoc();

        $expiryDate = strtotime($memberDetails['expiry_date']);
        $currentDate = time();
        $daysDifference = floor(($expiryDate - $currentDate) / (60 * 60 * 24));

        $membershipStatus = ($daysDifference < 0) ? 'Expired' : 'Active';
    } else {
        header("Location: members_list.php");
        exit();
    }
} else {
    header("Location: members_list.php");
    exit();
}
?>

<?php include('includes/header.php');?>

<style>
    @media print {
        body {
            background: none;
            padding: 0;
        }

        .btn * {
            visibility: hidden;
        }

        .print-button {
            display: none;
        }

        .card-tools {
            display: none;
        }

        .card {
            border: 2px solid #000;
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
            box-shadow: 2px 2px 5px #888888;
        }

        .card-body {
            padding: 20px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col-md-5,
        .col-md-2 {
            width: 45%;
        }

        .img-thumbnail {
            width: 100px;
            height: 100px;
        }

    }
</style>


<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php include('includes/nav.php');?>

        <?php include('includes/sidebar.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php include('includes/pagetitle.php');?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Member Profile Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Member Profile</h3>
                            <!-- Add Print Button -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" onclick="printMembershipCard('<?php echo $memberId; ?>')">
                                    <i class="fas fa-print"></i> Print
                                </button>
                                <!-- Add link to the print page -->
                                <a href="print_membership_card.php?id=<?php echo $memberId; ?>" target="_blank" class="btn btn-tool">
                                    <i class="fas fa-external-link-alt"></i> MembershipCard
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <p><strong>Membership Number:</strong> <?php echo $memberDetails['membership_number']; ?></p>
                                    <p><strong>Full Name:</strong> <?php echo $memberDetails['fullname']; ?></p>
                                    <p><strong>Date of Birth:</strong> <?php echo $memberDetails['dob']; ?></p>
                                    <p><strong>Gender:</strong> <?php echo $memberDetails['gender']; ?></p>
                                    <p><strong>Contact Number:</strong> <?php echo $memberDetails['contact_number']; ?></p>
                                    <p><strong>Email:</strong> <?php echo $memberDetails['email']; ?></p>
                                </div>
                                <div class="col-md-5">
                                    <p><strong>Address:</strong> <?php echo $memberDetails['address']; ?></p>
                                    <p><strong>Country:</strong> <?php echo $memberDetails['country']; ?></p>
                                    <p><strong>Postcode:</strong> <?php echo $memberDetails['postcode']; ?></p>
                                    <p><strong>Occupation:</strong> <?php echo $memberDetails['occupation']; ?></p>
                                    <p><strong>Membership Type:</strong> <?php echo $memberDetails['membership_type_name']; ?></p>
                                    <p><strong>Status:</strong> <?php echo $membershipStatus; ?></p>
                                </div>
                                <div class="col-md-2">
                                <?php
                                if (!empty($memberDetails['photo'])) {
                                    $photoPath = 'uploads/member_photos/' . $memberDetails['photo'];
                                    echo '<img src="' . $photoPath . '" class="img-thumbnail" alt="Member Photo">';
                                } else {
                                    echo '<p>No photo available</p>';
                                }
                                ?>
                                </div>
                                <a href="print_membership_card.php?id=<?php echo $memberId; ?>" target="_blank" class="print-button"><button class="btn btn-info"><i class="fas fa-id-card"></i> Membership Card</button></a>

                            </div>
                        </div>

                    </div>
                    <!-- End Member Profile Card -->
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong> &copy; <?php echo date('Y');?> codeastro.com</a> -</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            <b>Developed By</b> <a href="https://codeastro.com/">CodeAstro</a>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <?php include('includes/footer.php');?>

    <!-- JavaScript to handle printing -->
    <script>
        function printMembershipCard() {
            window.print();
        }
    </script>

</body>
</html>
