<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Ingredients Stock Management System</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
      <script src="vendor/jquery-3.2.1.min.js" charset="utf-8"></script>
      <script src="vendor/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'header.php'; ?>

    <!-- Code ni para sa pag Change Password -->
    <?php 
      if(isset($_POST['btnchangepassword'])){

        $old_password = md5($_POST['old_password']);
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if(DB::query('SELECT Password FROM account_registration WHERE Fullname=:Fullname AND Password=:Password', array(':Fullname'=>$getfullname, ':Password'=>$old_password))){

          if($new_password == $confirm_password){

            $new_password = md5($new_password);

            DB::query('UPDATE account_registration SET Password=:Password WHERE Fullname=:Fullname', array(':Fullname'=>$getfullname,':Password'=>$new_password));

            $success = "Your Password is Updated Successully!";

          }
          else{
            $warning = "Your New Password did not match! Try again...";
          }
        }
        else{
          $warning = "Your Old Password did not match! Try again...";
        }
      }
    ?>

    <div class="container" id="main_container">
      <div class="container">
      <?php
      if(isset($success)){
          echo '
              <div class="row">
                  <div class="col-sm-12">
                      <div class="alert alert-success">
                          <strong>Success!</strong> &nbsp;'. $success .'
                      </div>
                  </div>
              </div>
          ';
        }
      ?>
      <?php
      if(isset($warning)){
          echo '
              <div class="row">
                  <div class="col-sm-12">
                      <div class="alert alert-warning">
                          <strong>Warning!</strong> &nbsp;'. $warning .'
                      </div>
                  </div>
              </div>
          ';
        }
      ?>
    </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <div class="panel panel-default">
              <div class="panel-heading"><span class="fa fa-user"></span>&nbsp;&nbsp;Account Information</div>
              <div class="panel-body">
                <p class="user_name"><?php echo $getfullname; ?></p>
                <p class="mean">Fullname</p>
                <p class="user_position"><?php echo $getposition; ?></p>
                <p class="mean">Position</p>
                <p class="user_age"><?php echo $getage; ?> Years Old</p>
                <p class="mean">Age</p>
                <p class="user_address"><?php echo $getaddress; ?></p>
                <p class="mean">Address</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4"></div>
        </div>
      </div>
    </div>

    <!-- Change Password Modal -->
<div id="change" class="modal fade" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><span class="fa fa-gear"></span>&nbsp;Change Password</h4>
    </div>
    <div class="modal-body">
                  <?php
                      if(isset($warning)){
                          echo '
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="alert alert-warning">
                                          <strong>Warning!</strong> &nbsp;'. $warning .'
                                      </div>
                                  </div>
                              </div>
                          ';
                      }
                  ?>
      <form class="form" action="home.php" method="POST">
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="old_password">Old Password</label>
                <input class="form-control" type="password" name="old_password" id="old_password" required>
              </div>
              <div class="form-group">
                <label for="new_password">New Password</label>
                <input class="form-control" type="password" name="new_password" id="new_password" required>
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input class="form-control" type="password" name="confirm_password" id="confirm_password" required>
              </div>
              <div class="form-group">
                <input class="form-control btn btn-danger" type="submit" name="btnchangepassword" value="Change Password">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

  </div>
</div>
  </body>
</html>
