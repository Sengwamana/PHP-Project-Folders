<?php
require_once 'includes/header.php';
require_once 'includes/admin_nav.php';
LogInCheck();
if(!($_SESSION['role']=='admin'))
{
    header('location: admin_home.php');
}
?>
<nav class="nav">
    <div class="container-fluid">
        <h1 class="text-center"></h1>
    </div>
</nav><hr>
<div class="row">&nbsp;<br></div>
<div class="row">
    <div class="col-md-6 col-sm-12 mx-auto col-md-offset-3">
        <div class=" jumbotron card card-body bg-light mt-5">
            <h2 clas="text-center">Reset Password For Departments</h2>
            <p></p>
            <form action="<?php echo URLROOT; ?>/actions/__forgot_pass.php" method="post">

                <div>
                    <?php
                    //this will display any kind of error/success message
                    flash();
                    ?>
                </div>

                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter Department Email" required>
                </div>
                 <div class="form-group">
                    <div class="">
                        <label for="dept_id">DEPARTMENT: <sup>*</sup></label>
                        <!--begin option-->
                        <?php
                        //code for fetching the suppliers' information
                        require_once 'db.php';
                        $sql = "SELECT * FROM `department` WHERE `dept_id` <> '1'";
                        $query = $conn->query($sql);
                        echo "<select class='form-control id='dept_id' name='dept_id' required>";
                        echo"<option value=''>Select Department</option>";
                        while($row = $query->fetch_assoc()){
                            echo"<option value='".$row['dept_id']."'>".$row['dept_name']."</option>";
                        }
                        echo"</select>";
                        $conn->close();
                        ?>
                        <!--end-->
                    </div>
                </div>
                 <div class="form-group">
                     <input type="submit" value="RESET" name="submit" class="btn btn-success ">
                 </div>

            </form>
        </div>
    </div>
</div>

<?php require_once './includes/footer.php'; ?>





