<?php
include('includes/config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];

    $reportQuery = "SELECT m.*, mt.type AS membership_type_name
                    FROM members m
                    LEFT JOIN membership_types mt ON m.membership_type = mt.id
                    WHERE m.created_at BETWEEN '$fromDate' AND '$toDate'";
    $reportResult = $conn->query($reportQuery);
}

?>

<?php include('includes/header.php');?>
<style>
    @media print {
        form {
            display: none;
        }

        .print-button {
            display: none;
        }
    }
</style>


<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include('includes/nav.php');?>
  <?php include('includes/sidebar.php');?>
  
  <div class="content-wrapper">
    <?php include('includes/pagetitle.php');?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-keyboard"></i> Membership Report</h3>
              </div>
              
              <form method="post" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="fromDate">From Date:</label>
                    <input type="date" id="fromDate" name="fromDate" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="toDate">To Date:</label>
                    <input type="date" id="toDate" name="toDate" class="form-control" required>
                  </div>

                  <button type="submit" class="btn btn-success">Generate Report</button>
                </div>
              </form>
              
              <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  if ($reportResult->num_rows > 0) {
                    echo '<div class="card-body">';
                    echo '<table class="table table-bordered table-striped">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Membership Number</th>';
                    echo '<th>Full Name</th>';
                    echo '<th>Email</th>';
                    echo '<th>Type</th>';
                    echo '<th>Expires On</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    
                    while ($row = $reportResult->fetch_assoc()) {
                      echo '<tr>';
                      echo '<td>' . $row['membership_number'] . '</td>';
                      echo '<td>' . $row['fullname'] . '</td>';
                      echo '<td>' . $row['email'] . '</td>';
                      echo '<td>' . $row['membership_type_name'] . '</td>';
                      echo '<td>' . (($row['expiry_date'] === null) ? 'New Member' : $row['expiry_date']) . '</td>';
                      echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';

                    echo '<div class="card-footer">';
                    echo '<button type="button" class="btn btn-primary print-button" onclick="printReport()"><i class="fas fa-print"></i> Print Report</button>';
                    echo '</div>';
                  } else {
                    echo '<div class="card-body">';
                    echo '<p>No members found within the specified date range.</p>';
                    echo '</div>';
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>

  <footer class="main-footer">
    <strong> &copy; <?php echo date('Y');?> codeastro.com</a> -</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Developed By</b> <a href="https://codeastro.com/">CodeAstro</a>
    </div>
  </footer>
</div>

<?php include('includes/footer.php');?>

<script>
function printReport() {
    window.print();
}
</script>

</body>
</html>
