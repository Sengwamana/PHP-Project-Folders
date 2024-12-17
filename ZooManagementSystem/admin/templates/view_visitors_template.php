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
            <h1 class="h3 mb-4 text-gray-800">View <?= isset($_GET['archived']) ? "Archived" : "" ?> Visitors</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($visitors as $key => $visitor) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $visitor['v_firstname'] ?></td>
                                <td><?= $visitor['v_lastname'] ?></td>
                                <td><?= $visitor['v_email'] ?></td>
                                <td><?= $visitor['v_address'] ?></td>
                                <?php if (!isset($_GET['archived'])) { ?>
                                    <td>
                                        <a href="archive?arc_vis_id=<?= $visitor['visitor_id'] ?>&archive=true" class="btn btn-warning btn-sm d-inline-block"><i class="fas fa-archive"></i> Archive</a>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <a href="archive?arc_vis_id=<?= $visitor['visitor_id'] ?>&archive=false" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-box-open"></i> Unarchive</a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>