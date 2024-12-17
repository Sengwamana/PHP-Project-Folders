<?php
require_once './includes/header.php';
//if not logged in return him to login page
LogInCheck();
require_once './includes/admin_nav.php';
//var_dump($_SESSION);
?>
    <!--exp1-->

    <div class="col-sm-10 col-sm-offset-1">
    <div class="row">
        <!--place for error message flashing-->
        <?php
        //this will display any kind of error message as
        flash();
        ?>
    </div>
     <div class="" style="height: 10px;">
    </div>
    <div class="row">
    <table id="myTable" class="table table-bordered table-hover table-striped table-responsive">

   <?php
   include_once('db.php');
   //sql according to role

   $sql = "SELECT * FROM item WHERE `dept_id` = '1'" ;
    echo '<thead>
            <tr>
            <th>#</th>
            <th>ITEM</th>
            <th>CATEGORY</th>
            <th>DETAIL</th>
            <th>SUPPLIED AT</th>
            <th>ACTION</th>
            </tr>
            </thead>
            <tbody>';

           $result = $conn->query($sql);
           $i = 1;
           while($row = $result->fetch_assoc())
           {
           echo"<tr>
                    <td>".$i."</td>
					<td>".$row['item_name']."</td>
					<td>".$row['item_cat']."</td>
					<td>".$row['item_detail']."</td>
					<td>".$row['supplied_at']."</td>
					<td><a href='#allocate_".$row['item_id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span>Allocate</a>
					</td>
				</tr>";
                $i++;
               //require_once 'models/allocate_itemModel.php';
               include('models/allocate_itemModel.php') ;
           }
        //$conn->close();
    ?>
    </tbody>
    </table>
    <hr>
    </div>
    </div>






<?php require_once './includes/footer.php'; ?>