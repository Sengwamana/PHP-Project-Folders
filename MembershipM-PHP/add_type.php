<?php
include('includes/config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$response = array('success' => false, 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $membershipType = $_POST['membershipType'];
    $membershipAmount = $_POST['membershipAmount'];

    $insertQuery = "INSERT INTO membership_types (type, amount) VALUES ('$membershipType', $membershipAmount)";
    
    if ($conn->query($insertQuery) === TRUE) {
        $response['success'] = true;
        $response['message'] = 'Membership type added successfully!';
    } else {
        $response['message'] = 'Error: ' . $conn->error;
    }
}


?>

<?php include('includes/header.php');?>

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
        <!-- Info boxes -->
        <div class="row">
        
        <!-- left column --><!-- Visit codeastro.com for more projects -->
        <div class="col-md-12">

        <?php if ($response['success']): ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success</h5>
        <?php echo $response['message']; ?>
    </div>
<?php elseif (!empty($response['message'])): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Error</h5>
        <?php echo $response['message']; ?>
    </div>
<?php endif; ?>

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-keyboard"></i> Add Membership Type form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                <div class="card-body">
                <div class="row">
                <div class="col-sm-6">
                                    <label for="membershipType">Membership Type</label>
                                    <input type="text" class="form-control" id="membershipType" name="membershipType" placeholder="Enter membership type" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="membershipAmount">Amount</label>
                                    <input type="number" class="form-control" id="membershipAmount" name="membershipAmount" placeholder="Enter membership type amount" required>
                                </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
        <!-- Visit codeastro.com for more projects -->
        
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
</body>
</html>