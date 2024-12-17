<div class="container">
    <div class="row pb-5">
        <div class="col-md-8 order-md-1">
            <?php
            if (isset($_GET['msg'])) {
                echo '<div class="alert alert-' . $_GET['type'] . ' alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            ?>
            <h1 class="h3 mb-4 text-gray-800"><?= isset($_GET['l_id']) ? "Edit" : "Add"  ?> Location</h1>
            <form action="" method="post">
                <input type="hidden" name="location_id" value="<?php if (isset($location['location_id'])) echo $location['location_id']  ?>">
                <div class="mb-4 field-required">
                    <label for="location_name">Location Name</label>
                    <input type="text" value="<?= isset($location['location_name']) ? $location['location_name'] : ""  ?>" class="form-control" id="location_name" placeholder="" name="location_name" required>
                </div>
                <!-- <hr class="mb-3"> -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="archived" name="location_archived" value="true" <?= isset($location['location_archived']) && $location['location_archived'] == "true" ? "checked" : "" ?>>
                    <label class="custom-control-label" for="archived">Archived</label>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"><?= isset($_GET['l_id']) ? "Edit" : "Add"  ?> Location</button>
            </form>
        </div>
    </div>
</div>