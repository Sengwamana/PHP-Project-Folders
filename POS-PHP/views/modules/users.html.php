<div class="content-wrapper">

  <section class="content-header">

    <h1>

      User management

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#addUser">

          Add user

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
             <th>Last login</th>
             <th>Actions</th>

           </tr> 

          </thead>

          <tbody>

            <tr>
              
              <td>1</td>
              <td>User Administrator</td>
              <td>admin</td>
              <td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrator</td>
              <td><button class="btn btn-success btn-xs">Active</button></td>
              <td>2017-12-11 12:05:32</td>
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>

                </div>  

              </td>

            </tr>

            <tr>
              
              <td>1</td>
              <td>User Administrator</td>
              <td>admin</td>
              <td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrator</td>
              <td><button class="btn btn-success btn-xs">Active</button></td>
              <td>2017-12-11 12:05:32</td>
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>

                </div>  

              </td>

            </tr>

             <tr>
              
              <td>1</td>
              <td>User Administrator</td>
              <td>admin</td>
              <td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrator</td>
              <td><button class="btn btn-success btn-xs">Active</button></td>
              <td>2017-12-11 12:05:32</td>
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>

                </div>  

              </td>

            </tr>

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

      <form role="form" method="POST" enctype="multipart/formdata">

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

                <input class="form-control input-lg" type="text" name="newName" placeholder="Add name" required>

              </div>

            </div>

            <!-- input username -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" name="newUser" placeholder="Add username" required>

              </div>

            </div>

            <!-- input password -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="text" name="newPasswd" placeholder="Add password" required>

              </div>

            </div>

            <!-- input profile -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="newProfile">

                  <option value="">Select profile</option>
                  <option value="administrator">Administrator</option>
                  <option value="special">Special</option>
                  <option value="seller">Seller</option>

                </select>

              </div>

            </div>

            <!-- input password -->

            <div class="form-group">

              <div class="panel">Upload image</div>

              <input id="newPhoto" type="file" name="newPhoto">

              <p class="help-block">Maximum size 200Mb</p>

              <img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="100px">

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

      </form>

    </div>

  </div>

</div>

<!--====  End of module add user  ====-->
