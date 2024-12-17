<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Department</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__add_departmentModel.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">DEPARTMENT: </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="20" name="dept_name" placeholder="enter department name" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">DETAIL:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="50" name="dept_details" placeholder="department details" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">PASSWORD:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" maxlength="20" name="pass" placeholder="type dept password" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">CONFIRM :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" maxlength="20" placeholder="confirm password" name="con_pass">
                            </div>
                        </div>
                        <!--input type="hidden" class="form-control" name="dept_id" value="<?php //echo date('Y-M-D'); ?>"-->



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>