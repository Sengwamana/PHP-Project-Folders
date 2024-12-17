<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['supplier_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Supplier Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__edit_supplierModel.php">
                        <input type="hidden" class="form-control" name="supplier_id" value="<?php echo $row['supplier_id']; ?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">NAME:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="supplier_name" value="<?php echo $row['supplier_name']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">DETAIL:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="supplier_details" value="<?php echo $row['supplier_details']; ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
                    </form>
            </div>

        </div>
    </div>
</div>



