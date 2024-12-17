<div class="container-fluid">
    <div class="row">
        <div class="col">
            <?php
            if (isset($_GET['msg'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            ?>
            <h1 class="h3 mb-4 text-gray-800">View <span class="text-capitalize"><?= $_GET['type'] . 's' ?></span> </h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($accounts as $key => $account) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $account['admin_name'] ?></td>
                                <td><?= $account['admin_email'] ?></td>
                                <td>
                                    <?php if ($account['admin_id'] != $_SESSION['admin_id']) { ?>
                                        <a href="archive?arc_account_id=<?= $account['admin_id'] ?>&arc_account_type=<?= $account['role']?>" class="btn btn-warning btn-sm d-inline-block"><i class="fas fa-archive"></i> Archive</a>
                                    <?php } ?>
                                    <a href="save_account?account_id=<?= $account['admin_id'] ?>" class="btn btn-primary btn-sm d-inline-block ml-3"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>