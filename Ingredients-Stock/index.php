<!DOCTYPE html>
<?php include_once 'connection/db.php'; ?>
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
  <!-- Code ni para sa LOGIN -->
  <?php
    session_start();
    if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password = md5($_POST['password']);

      if(DB::query('SELECT Username FROM account_registration WHERE Username=:Username', array(':Username'=>$username))){

            if(DB::query('SELECT Password FROM account_registration WHERE Username=:Username AND Password=:Password', array(':Username'=>$username, ':Password'=>$password))){

                    $_SESSION['get_fullname'] = DB::query('SELECT Fullname FROM account_registration WHERE Username=:Username', array(':Username'=>$username))[0]['Fullname'];
                    $_SESSION['get_age'] = DB::query('SELECT Age FROM account_registration WHERE Username=:Username', array(':Username'=>$username))[0]['Age'];
                    $_SESSION['get_address'] = DB::query('SELECT Address FROM account_registration WHERE Username=:Username', array(':Username'=>$username))[0]['Address'];
                    $_SESSION['get_position'] = DB::query('SELECT Position FROM account_registration WHERE Username=:Username', array(':Username'=>$username))[0]['Position'];
                    // This is how we'll know the user is logged in
                    $_SESSION['logged_in'] = true;
                    header('Location:home.php');
            }
            else{
                $alert = 'Your password is incorrect!';
            }

        }
        else{
            $alert =  "Admin account doesn't exist!";
        }


    }
   ?>
  <body>
    <div class="container">
      <div class="container" id="title_container">
        <div class="container-fluid">
          <h1 class="brand">Ingredients Stock Management System</h1>
        </div>
        <div class="btn -group">
          <a class="btn btn-success" href="#" data-toggle="modal" data-target="#contact"><span class="fa fa-phone"></span>&nbsp;Contact Us</a>
          <a class="btn btn-success" href="#" data-toggle="modal" data-target="#about"><span class="fa fa-info-circle"></span>&nbsp;About Us</a>
        </div>
      </div>
    </div>
    <div class="container" id="main_container">
      <div class="container">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <div class="panel panel-default">
              <div class="panel-heading"><span class="fa fa-lock"></span>&nbsp;&nbsp;Login</div>
              <div class="panel-body">
                <?php
                      if(isset($alert)){
                          echo '
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="alert alert-danger">
                                          <strong>Login Failed!</strong> '.$alert .'
                                      </div>
                                  </div>
                              </div>
                          ';
                      }
                  ?>
                <form class="form" action="index.php" method="post">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                  </div>
                  <div class="form-group">
                    <button class="form-control btn btn-success" style="border-radius:0%;" type="submit" name="login">Login</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-sm-4"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact Us Modal -->
<div id="contact" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="fa fa-phone"></span>&nbsp;Contact Us</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <!-- About Us Modal -->
    <div id="about" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="fa fa-info-circle"></span>&nbsp;About Us</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

    </div>
    </div>
  </body>
</html>
