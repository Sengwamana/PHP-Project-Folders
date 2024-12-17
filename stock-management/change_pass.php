<?php
require_once './includes/header.php';
LogInCheck();
require_once './includes/admin_nav.php';
?>
    <!--pwd change begin-->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="text-center text-info">CHANGE PASSWORD</div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="well well-lg">
                                <form action="<?php echo URLROOT; ?>/actions/__change_pass.php" method="post">
                                    <!--place for error message flashing-->
                                    <div>
                                        <?php
                                        //this will display any kind of error/success message
                                        flash();
                                        ?>
                                    </div>
                                    <div class="alert-info text-center">
                                        <em>* Fields Are Required </em>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass">CURRENT PASSWORD: <sup>*</sup></label>
                                        <input type="password" name="pass" class="form-control form-control-lg" placeholder="enter current password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_pass">NEW PASSWORD: <sup>*</sup></label>
                                        <input type="password" name="new_pass" id="new_pass" class="form-control form-control-lg" placeholder="enter new password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="con_pass">CONFIRM PASSWORD: <sup>*</sup></label>
                                        <input type="password" name="con_pass" id="con_pass" class="form-control form-control-lg"
                                               placeholder="confirm new password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Change" name="Change"  class="btn btn-success btn-sm">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end pwd chnge-->

    <hr>
<br>
    <script>

    </script>
<?php require_once './includes/footer.php'; ?>