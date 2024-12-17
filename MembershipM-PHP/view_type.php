<?php
include('includes/config.php');

$selectQuery = "SELECT * FROM membership_types";
$result = $conn->query($selectQuery);

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$fetchCurrencyQuery = "SELECT currency FROM settings WHERE id = 1";
$fetchCurrencyResult = $conn->query($fetchCurrencyQuery);

if ($fetchCurrencyResult->num_rows > 0) {
    $currencyDetails = $fetchCurrencyResult->fetch_assoc();
    $currencySymbol = $currencyDetails['currency'];
} else {
    $currencySymbol = '$';
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $membershipType = $_POST['membershipType'];
    $membershipAmount = $_POST['membershipAmount'];

    $insertQuery = "INSERT INTO membership_types (type, amount) VALUES ('$membershipType', $membershipAmount)";
    
    if ($conn->query($insertQuery) === TRUE) {
        $successMessage = 'Membership type added successfully!';
        // header("Location: dashboard.php");
        // exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
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
        
        <div class="col-12">

        <div class="card">
    <div class="card-header">
        <h3 class="card-title">Membership Types DataTable</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $counter = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$counter}</td>";
                    echo "<td>{$row['type']}</td>";
                    echo "<td>{$currencySymbol} {$row['amount']}</td>";
                    echo "<td>
                            <a href='edit_type.php?id={$row['id']}' class='btn btn-primary'><i class='fas fa-edit'></i> Edit</a>
                            <button class='btn btn-danger' onclick='deleteMembership({$row['id']})'><i class='fas fa-trash'></i> Delete</button>
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

<script>
    function deleteMembership(id) {
        if (confirm("Are you sure you want to delete this membership type?")) {
            window.location.href = 'delete_membership.php?id=' + id;
        }
    }
</script>

</body>
</html>