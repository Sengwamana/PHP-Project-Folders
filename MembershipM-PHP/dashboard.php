<?php
include('includes/config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// $pageTitle = 'Dashboard';

//counter parts
function getTotalMembersCount()
{
    global $conn;

    $totalMembersQuery = "SELECT COUNT(*) AS totalMembers FROM members";
    $totalMembersResult = $conn->query($totalMembersQuery);

    if ($totalMembersResult->num_rows > 0) {
        $totalMembersRow = $totalMembersResult->fetch_assoc();
        return $totalMembersRow['totalMembers'];
    } else {
        return 0;
    }
}

function getTotalMembershipTypesCount()
{
    global $conn;

    $totalMembershipTypesQuery = "SELECT COUNT(*) AS totalMembershipTypes FROM membership_types";
    $totalMembershipTypesResult = $conn->query($totalMembershipTypesQuery);

    if ($totalMembershipTypesResult->num_rows > 0) {
        $totalMembershipTypesRow = $totalMembershipTypesResult->fetch_assoc();
        return $totalMembershipTypesRow['totalMembershipTypes'];
    } else {
        return 0;
    }
}

function getExpiringSoonCount()
{
    global $conn;

    $expiringSoonQuery = "SELECT COUNT(*) AS expiringSoon FROM members WHERE expiry_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 7 DAY";
    $expiringSoonResult = $conn->query($expiringSoonQuery);

    if ($expiringSoonResult->num_rows > 0) {
        $expiringSoonRow = $expiringSoonResult->fetch_assoc();
        return $expiringSoonRow['expiringSoon'];
    } else {
        return 0;
    }
}

// function getTotalRevenue()
// {
//     global $conn;

//     $totalRevenueQuery = "SELECT SUM(total_amount) AS totalRevenue FROM renew";
//     $totalRevenueResult = $conn->query($totalRevenueQuery);

//     if ($totalRevenueResult->num_rows > 0) {
//         $totalRevenueRow = $totalRevenueResult->fetch_assoc();
//         return $totalRevenueRow['totalRevenue'];
//     } else {
//         return 0;
//     }
// }

function getTotalRevenueWithCurrency()
{
    global $conn;

    $currencyQuery = "SELECT currency FROM settings LIMIT 1";
    $currencyResult = $conn->query($currencyQuery);

    if ($currencyResult->num_rows > 0) {
        $currencyRow = $currencyResult->fetch_assoc();
        $currencySymbol = $currencyRow['currency'];
    } else {
        $currencySymbol = '$'; // Default currency symbol (you can change this as needed)
    }

    $totalRevenueQuery = "SELECT SUM(total_amount) AS totalRevenue FROM renew";
    $totalRevenueResult = $conn->query($totalRevenueQuery);

    if ($totalRevenueResult->num_rows > 0) {
        $totalRevenueRow = $totalRevenueResult->fetch_assoc();
        $totalRevenue = $totalRevenueRow['totalRevenue'];
    } else {
        $totalRevenue = 0;
    }

    return $currencySymbol . number_format($totalRevenue, 2);
}

function getNewMembersCount() {
  global $conn;
  // Visit codeastro.com for more projects
  $twentyFourHoursAgo = time() - (24 * 60 * 60);

  $newMembersQuery = "SELECT COUNT(*) AS newMembersCount FROM members WHERE created_at >= FROM_UNIXTIME($twentyFourHoursAgo)";
  $newMembersResult = $conn->query($newMembersQuery);

  if ($newMembersResult) {
      $row = $newMembersResult->fetch_assoc();
      return $row['newMembersCount'];
  } else {
      return 0;
  }
}

// Function to display the total count of new members with HTML markup
function displayNewMembersCount() {
  $newMembersCount = getNewMembersCount();
  echo "<span class='info-box-number'>$newMembersCount</span>";
}


function getExpiredMembersCount() {
  global $conn;

  $expiredMembersQuery = "SELECT COUNT(*) AS expiredMembersCount FROM members WHERE (expiry_date IS NULL OR expiry_date < NOW())";
  $expiredMembersResult = $conn->query($expiredMembersQuery);

  if ($expiredMembersResult) {
      $row = $expiredMembersResult->fetch_assoc();
      return $row['expiredMembersCount'];
  } else {
      return 0;
  }
}

function displayExpiredMembersCount() {
  $expiredMembersCount = getExpiredMembersCount();
  echo "<span class='info-box-number'>$expiredMembersCount</span>";
}

$fetchLogoQuery = "SELECT logo FROM settings WHERE id = 1";
$fetchLogoResult = $conn->query($fetchLogoQuery);

if ($fetchLogoResult->num_rows > 0) {
    $settings = $fetchLogoResult->fetch_assoc();
    $logoPath = $settings['logo'];
} else {
    $logoPath = 'dist/img/default-logo.png';
}
// Visit codeastro.com for more projects
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
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Members</span>
                <span class="info-box-number">
                <?php echo getTotalMembersCount(); ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Membership Types</span>
                <span class="info-box-number"><?php echo getTotalMembershipTypesCount(); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hourglass-half"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Expiring Soon</span>
                <span class="info-box-number"><?php echo getExpiringSoonCount(); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Revenue</span>
                <span class="info-box-number"><?php echo getTotalRevenueWithCurrency(); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Visit codeastro.com for more projects -->
        <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number"><?php displayNewMembersCount(); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-times"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Expired Membership</span>
                <span class="info-box-number"><?php displayExpiredMembersCount(); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <!-- Main row -->
        <div class="row">

          <div class="col-md-12">
            
            

            <!-- Member LIST -->
            <?php
            // Fetch recently joined members
            $recentMembersQuery = "SELECT * FROM members ORDER BY created_at DESC LIMIT 4";
            $recentMembersResult = $conn->query($recentMembersQuery);
            ?>

          <div class="card">
              <div class="card-header">
            <h3 class="card-title">Recently Joined Members</h3>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- Visit codeastro.com for more projects -->
    <!-- /.card-header -->
    <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
            <?php
            while ($row = $recentMembersResult->fetch_assoc()) {
                echo '<li class="item">';
                echo '<div class="product-img">';
                // Check if the member has a photo
                  if (!empty($row['photo'])) {
                    $photoPath = 'uploads/member_photos/' . $row['photo'];
                    echo '<img src="' . $photoPath . '" alt="Member Photo" class="img-size-50">';
                } else {
                    echo '<img src="uploads/member_photos/default.jpg" alt="Default Photo" class="img-size-50">';
                }
                echo '</div>';
                echo '<div class="product-info">';
                echo '<a href="javascript:void(0)" class="product-title">' . $row['fullname'] . '</a>';
                echo '<span class="product-description">';
                echo '<span class="badge badge-dark float-right">' . getMembershipTypeName($row['membership_type']) . '</span>';
                echo 'Membership Number: ' . ($row['membership_number']); 
                echo '</span>';
                echo '</div>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-center">
        <a href="manage_members.php" class="uppercase">View All Members</a>
    </div>
    <!-- /.card-footer -->
</div>

<?php
// Function to get membership type name based on membership type ID
function getMembershipTypeName($membershipTypeId)
{
    global $conn;
    $membershipTypeQuery = "SELECT type FROM membership_types WHERE id = $membershipTypeId";
    $membershipTypeResult = $conn->query($membershipTypeQuery);

    if ($membershipTypeResult->num_rows > 0) {
        $membershipTypeRow = $membershipTypeResult->fetch_assoc();
        return $membershipTypeRow['type'];
    } else {
        return 'Unknown';
    }
}
?>

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
</body>
</html>