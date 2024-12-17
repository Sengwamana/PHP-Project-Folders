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
    <div class="row">
        <?php
        if($_SESSION['role']== 'admin')
            {
            echo'<a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>';
            }
        ?>
        <a href="./reports/all_items.php" target="_new" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a>
    </div>
    <div class="" style="height: 10px;">
    </div>
    <div class="row">

    <marquie><h3 class="text-muted text-center">ALL ITEMS</h3></marquie>
       <table id="myTable" class="table table-hover table-bordered table-striped table-responsive">
            
            <?php
			include_once('db.php');
			//sql according to role
            $item_current_dept_id = $_SESSION['dept_id'];
			//$sql = ($_SESSION['role']=='admin') ? "SELECT * FROM item,department,supplier
            //                                       WHERE item.dept_id = department.dept_id
            //                                       AND item.supplier_id = supplier.supplier_id" :
            //                                       "SELECT * FROM item,department
            //                                       WHERE item.dept_id = department.dept_id
            //                                        AND item.dept_id = '".$item_current_dept_id."'";

            $sql = ($_SESSION['role']=='admin') ? "SELECT * FROM item JOIN department JOIN supplier
                                                 WHERE item.dept_id = department.dept_id 
                                                 AND item.supplier_id = supplier.supplier_id" :
                                                   "SELECT * FROM item,department
                                                   WHERE item.dept_id = department.dept_id 
                                                    AND item.dept_id = '".$item_current_dept_id."'";
            if($_SESSION['role'] == 'admin')
            {
			//echo for admin
            echo '<thead>
            <tr>
            <th>#</th>
            <th>ITEM</th>
            <th>CATEGORY</th>
            <th>DETAIL</th>
            <th>SUPPLIER </th>
            <th>DEPARTMENT</th>
            <th>SUPPLIED AT</th>
            <th>ACTION</th>
            </tr>
            </thead>
            <tbody>';

			$query = $conn->query($sql);
			$i = 1;
			while($row = $query->fetch_assoc())
            {
			echo"<tr>
                    <td>".$i."</td>
					<td>".$row['item_name']."</td>
					<td>".$row['item_cat']."</td>
					<td>".$row['item_detail']."</td>
					
					<td>".$row['supplier_name']."</td>
					<td>".$row['dept_name']."</td>
					<td>".$row['supplied_at']."</td>
					<td><a href='#edit_".$row['item_id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
					<a href='#delete_".$row['item_id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
					</td>
				</tr>";
			    $i++;
				include('models/edit_delete_itemModel.php') ;
			}
			?>
            </tbody>
       </table>
        <hr>
    <?php
        //add required models
        require_once 'models/add_itemModel.php';
    ?>
</div>
</div>
    <?php
                //end of admin check
            }

    //begin for non admin view


        if($_SESSION['role'] == 'dept') {
            //echo for admin
            echo '<thead>
            <th>SL NO</th>
            <th>ID</th>
            <th>ITEM</th>
            <th>CATEGORY</th>
            <th>DETAIL</th>
            </thead>
            <tbody>';

            $query = $conn->query($sql);
            $i = 1;
            while ($row = $query->fetch_assoc()) {
                echo "<tr>
                    <td>" . $i . "</td>
					<td>" . $row['item_id'] . "</td>
					<td>" . $row['item_name'] . "</td>
					<td>" . $row['item_cat'] . "</td>
					<td>" . $row['item_detail'] . "</td>
					</tr>";
                $i++;

            }
        }
            ?>
            </tbody>
            </table>
            <hr>
            </div>
            </div>



<?php require_once './includes/footer.php'; ?>