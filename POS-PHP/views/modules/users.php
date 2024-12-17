
<div class="content-wrapper">
	<!-- Log on to codeastro.com for more projects! -->
  <section class="content-header">

    <h1>

      User Management

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-success" data-toggle="modal" data-target="#addUser">

         <i class="fa fa-plus"></i> Add User

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Name</th>
             <th>Username</th>
             <th>Photo</th>
             <th>Profile</th>
             <th>Status</th>
             <th>Last Login</th>
             <th>Actions</th>

           </tr> 

          </thead>
			<!-- Log on to codeastro.com for more projects! -->
          <tbody>

            <?php

              $item = null; 
              $value = null;

              $users = ControllerUsers::ctrShowUsers($item, $value);

              // var_dump($users);

              foreach ($users as $key => $value) {

                echo '

                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["name"].'</td>
                    <td>'.$value["user"].'</td>';

                    if ($value["photo"] != ""){

                      echo '<td><img src="'.$value["photo"].'" class="img-thumbnail" width="40px"></td>';

                    }else{

                      echo '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                    
                    }

                    echo '<td>'.$value["profile"].'</td>';

                    if($value["status"] != 0){

                      echo '<td><button class="btn btn-success btnActivate btn-xs" userId="'.$value["id"].'" userStatus="0">Activated</button></td>';

                    }else{

                      echo '<td><button class="btn btn-danger btnActivate btn-xs" userId="'.$value["id"].'" userStatus="1">Deactivated</button></td>';
                    }
                    
                    echo '<td>'.$value["lastLogin"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-primary btnEditUser" idUser="'.$value["id"].'" data-toggle="modal" data-target="#editUser"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnDeleteUser" userId="'.$value["id"].'" username="'.$value["user"].'" userPhoto="'.$value["photo"].'"><i class="fa fa-trash"></i></button>

                      </div>  

                    </td>

                  </tr>';
              }

            ?>

          </tbody>

        </table>

      </div>
    
    </div>

  </section>

</div>

<!--=====================================
=            module add user            =
======================================-->

<!-- Modal -->
<div id="addUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #DD4B39; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Add User</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--Input name -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="newName" placeholder="Enter fullname" required>

              </div>

            </div>

            <!-- input username -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" id="newUser" name="newUser" placeholder="Enter username" required>

              </div>

            </div>

            <!-- input password -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="password" name="newPasswd" placeholder="Enter password" required>

              </div>

            </div>

            <!-- input profile -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="newProfile">

                  <option value="">Select Level</option>
                  <option value="administrator">Administrator</option>
                  <option value="special">Special</option>
                  <option value="seller">Seller</option>

                </select>

              </div>

            </div>

            <!-- Uploading image -->
            <div class="form-group">

              <div class="panel">Upload image</div>

              <input class="newPics" type="file" name="newPhoto">

              <p class="help-block">Maximum size 2Mb</p>

              <img class="thumbnail preview" src="views/img/users/default/prfplaceholder.png" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-success">Save</button>
          
        </div>

          <?php
            $createUser = new ControllerUsers();
            $createUser -> ctrCreateUser();
          ?>

      </form>

    </div>

  </div>

</div>
<!--====  End of module add user  ====-->

<!--=====================================
=            module edit user            =
======================================-->

<!-- Modal -->
<div id="editUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #DD4B39; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit User</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--Input name -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" id="EditName" name="EditName" placeholder="Edit name" required>

              </div>

            </div>

            <!-- input username -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" id="EditUser" name="EditUser" placeholder="Edit username" readonly>

              </div>

            </div>

            <!-- input password -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="password" name="EditPasswd" placeholder="Enter new password">

                <input type="hidden" name="currentPasswd" id="currentPasswd">

              </div>

            </div>

            <!-- input profile -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="EditProfile">

                  <option value="" id="EditProfile"></option>
                  <option value="administrator">Administrator</option>
                  <option value="special">Special</option>
                  <option value="seller">Seller</option>

                </select>

              </div>

            </div>

            <!-- Uploading image -->
            <div class="form-group">

              <div class="panel">Upload image</div>

              <input class="newPics" type="file" name="editPhoto">

              <p class="help-block">Maximum size 2Mb</p>

              <img class="thumbnail preview" src="views/img/users/default/anonymous.png" alt="" width="100px">

              <input type="hidden" name="currentPicture" id="currentPicture">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-success">Edit User</button>
          
        </div>

          <?php
            $editUser = new ControllerUsers();
            $editUser -> ctrEditUser();
          ?>

      </form>

    </div>

  </div>
	<!-- Log on to codeastro.com for more projects! -->
</div>

<?php

  $deleteUser = new ControllerUsers();
  $deleteUser -> ctrDeleteUser();

?> 