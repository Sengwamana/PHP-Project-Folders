<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <title>Ingredients Stock Management System | Account Registration</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <script src="vendor/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'header.php'; ?>
    
    <!-- Code ni para sa pag Register ug Account -->
    <?php

      if(isset($_POST['account_register'])){

        $fullname = $_POST['fullname'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $position = $_POST['position'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];


        if(!DB::query('SELECT Fullname FROM account_registration WHERE Fullname=:Fullname', array(':Fullname'=>$fullname))){

          if($password === $repassword){
            $repassword = md5($repassword);
            DB::query('INSERT INTO account_registration VALUES(:Fullname, :Age, :Address, :Position, :Username, :Password)',
                              array(':Fullname'=>$fullname, ':Age'=>$age, ':Address'=>$address, ':Position'=>$position, ':Username'=>$username, ':Password'=>$repassword));
            $success = "Registered Successfully!";
          }
          else{
            $alert = "Password did not match! Try again...";
          }
        }
        else{
          $alert = "This account is already registered!";
        }
      }
     ?>

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
    
    <div class="container">
      <div class="container-fluid">
        <h3>Account Registration</h3>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="panel panel-default">
              <div class="panel-heading"><span class="fa fa-user"></span>&nbsp;&nbsp;Account Registration</div>
              <div class="panel-body">
                <?php
                      if(isset($alert)){
                          echo '
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="alert alert-warning">
                                          <strong>Warning!</strong> &nbsp;'. $alert .'
                                      </div>
                                  </div>
                              </div>
                          ';
                      }

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
                <form class="form" action="account_registration.php" method="post">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="fullname">Fullname</label>
                      <input class="form-control" type="text" name="fullname" id="fullname" required>
                    </div>
                    <div class="form-group">
                      <label for="age">Age</label>
                      <input class="form-control" min="1" type="number" name="age" id="age" required>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input class="form-control" type="text"  name="address" id="address" required>
                    </div>
                    <div class="form-group">
                      <label for="position">Position</label>
                      <select class="form-control" id="position" name="position" required>
                        <option value="">--PLEASE SELECT A POSITION--</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="USER">USER</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username" required>
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                      </div>
                      <div class="form-group">
                        <label for="repassword">Re-enter Password</label>
                        <input class="form-control" type="password" name="repassword" id="repassword" required>
                      </div>
                      <div class="form-group">
                        <input class="form-control btn btn-success" style="border-radius:0%;" type="submit" name="account_register" id="account_register" value="Register">
                      </div>
                  </div>
                </form>
              </div>
          </div>
          </div>
        </div>
    </div>
  </body>

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
</html>
