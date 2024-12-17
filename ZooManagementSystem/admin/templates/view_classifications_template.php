<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">View <?= isset($_GET['archived']) ? "Archived" : "" ?> Classifications</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" style="min-width: 700px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Classification Display Name</th>
                            <th scope="col">Classification Table Name</th>
                            <th scope="col">Archived</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($classifications as $key => $classification) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $classification['class_display_name'] ?></td>
                                <td><?= $classification['class_table_name'] ?></td>
                                <td><?= $classification['class_archived'] ?></td>
                                <?php if (!isset($_GET['archived'])) { ?>
                                    <td style="max-width: 200px;">
                                        <a href="save_classification?class_id=<?= $classification['class_id'] ?>" class="btn btn-primary btn-sm d-inline-block"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="archive?class_id=<?= $classification['class_id'] ?>&archive=true" class="btn btn-warning btn-sm d-inline-block"><i class="fas fa-archive"></i> Archive</a>
                                    </td>
                                <?php } else { ?>
                                    <td style="max-width: 140px">
                                        <a href="archive?class_id=<?= $classification['class_id'] ?>&archive=false" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-box-open"></i> Unarchive</a>
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