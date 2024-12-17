<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['item_id']; ?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Item Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__edit_itemModel.php">
                        <input type="hidden" class="form-control" name="item_id" value="<?php echo $row['item_id']; ?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">ITEM:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="item_name"
                                       value="<?php echo $row['item_name']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">CATEGORY:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="item_cat"
                                       value="<?php echo $row['item_cat']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">DETAIL:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="item_detail"
                                       value="<?php echo $row['item_detail']; ?>">
                           </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">BILL ID:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="bill_no"
                                       value="<?php echo $row['bill_no']; ?>">
                                <?php //$conn->close();?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">SUPPLIED ON:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="bill_no"
                                       value="<?php echo $row['supplied_at']; ?>" readonly>
                                <?php //$conn->close();?>
                            </div>
                        </div>

                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> Cancel
                </button>
                <button type="submit" name="edit" class="btn btn-success"><span
                            class="glyphicon glyphicon-check"></span> Update</a>
                    </form>
            </div>

        </div>
    </div>
</div>

<!--Delete  Item Modal begin-->
<div class="modal fade" id="delete_<?php echo $row['item_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Item</h4></center>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to Delete</p>
                <h2 class="text-center"><?php echo $row['item_name']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="./actions/__delete_itemModel.php?item_id=<?php echo $row['item_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
<!--end-->
