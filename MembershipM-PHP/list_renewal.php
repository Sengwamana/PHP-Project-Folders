<?php
include('includes/config.php');

$selectQuery = "SELECT * FROM members";
$result = $conn->query($selectQuery);

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
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
        <!-- Visit codeastro.com for more projects -->
        <div class="row">
        
        <div class="col-12">

        <div class="card">
    <div class="card-header">
        <h3 class="card-title">Members DataTable</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Fullname</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Type</th>
                <th>Expiry</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;
            while ($row = $result->fetch_assoc()) {
                $expiryDate = strtotime($row['expiry_date']);
                $currentDate = time();
                $daysDifference = floor(($expiryDate - $currentDate) / (60 * 60 * 24));

                $membershipStatus = ($daysDifference < 0) ? 'Expired' : 'Active';
                if ($membershipStatus === 'Expired') {
                  $badgeClass = 'badge-danger';
                } elseif ($membershipStatus === 'Active') {
                    $badgeClass = 'badge-success';
                } else {
                    $badgeClass = 'badge-secondary';
                }

                $membershipTypeId = $row['membership_type'];
                $membershipTypeQuery = "SELECT type FROM membership_types WHERE id = $membershipTypeId";
                $membershipTypeResult = $conn->query($membershipTypeQuery);
                $membershipTypeRow = $membershipTypeResult->fetch_assoc();
                $membershipTypeName = ($membershipTypeRow) ? $membershipTypeRow['type'] : 'Unknown';

                $expiryDate = strtotime($row['expiry_date']);
                $daysRemaining = floor(($expiryDate - $currentDate) / (60 * 60 * 24));

                echo "<tr>";
                echo "<td>{$row['membership_number']}</td>";
                echo "<td>{$row['fullname']}</td>";
                echo "<td>{$row['contact_number']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$membershipTypeName}</td>";
                if ($row['expiry_date'] === NULL) {
                  echo "<td>NONE</td>";
              } else {
                  $expiryDate = new DateTime($row['expiry_date']);
                  $currentDate = new DateTime();
              
                  $daysRemaining = $currentDate->diff($expiryDate)->days;

              
                  echo "<td>{$row['expiry_date']}<br><small>{$daysRemaining} days remaining</small></td>";
              }                echo "<td><span class='badge $badgeClass'>$membershipStatus</span></td>";


                echo "<td>
                <a href='renew.php?id={$row['id']}' class='btn btn-success'>Renew</a>
                    </td>";
                echo "</tr>";

                $counter++;
            }
            ?>
        </tbody>
    </table>
</div>

    <!-- /.card-body -->
</div>
<!-- Visit codeastro.com for more projects -->
            <!-- /.card -->
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

        
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>