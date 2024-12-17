<div class="container">
    <div class="row pb-5">
        <div class="col-md-8 order-md-1">
            <?php
            if (isset($_GET['msg'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            ?>
            <h1 class="h3 mb-4 text-gray-800"><?= isset($_GET['account_id']) ? "Edit" : "Add"  ?> User Account</h1>
            <form action="" method="post">
                <input type="hidden" name="admin_id" value="<?php if (isset($account['admin_id'])) echo $account['admin_id']  ?>">
                <div class="mb-4 field-required">
                    <label for="class_display_name">Full Name</label>
                    <input type="text" value="<?= isset($account['admin_name']) ? $account['admin_name'] : ""  ?>" class="form-control" id="class_display_name" placeholder="" name="admin_name" required>
                </div>

                <div class="mb-4 field-required">
                    <label for="admin_email">Email</label>
                    <input type="email" value="<?= isset($account['admin_email']) ? $account['admin_email'] : ""  ?>" class="form-control" id="admin_email" placeholder="" name="admin_email" required>
                </div>

                <div class="mb-4 field-required">
                    <label for="v_type">User Type</label>
                    <select class="custom-select d-block w-100" name="role" id="v_type" required>
                        <option value="admin" <?= isset($account['role']) && $account['role'] == "admin" ? "selected" : ""  ?>>Administrator</option>;
                        <option value="manager" <?= isset($account['role']) && $account['role'] == "manager" ? "selected" : ""  ?>>Manager</option>;
                        <option value="zookeeper" <?= isset($account['role']) && $account['role'] == "zookeeper" ? "selected" : ""  ?>>Zookeeper</option>;
                    </select>
                </div>
                <?php if (!isset($_GET['account_id'])) { ?>
                    <div class="mb-4 field-required">
                        <label for="v_start_date">Password</label>
                        <input type="password" value="" class="form-control" name="admin_pass" id="v_start_date" required>
                    </div>
                <?php } ?>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"><?= isset($_GET['account_id']) ? "Edit" : "Add"  ?> Account</button>
            </form>
        </div>
    </div>
</div>