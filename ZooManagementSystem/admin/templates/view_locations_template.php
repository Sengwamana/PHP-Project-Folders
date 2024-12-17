<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">View <?= isset($_GET['archived']) ? "Archived" : "" ?> Locations</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" style="min-width: 600px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Location Name</th>
                            <th scope="col">Archived</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($locations as $key => $location) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $location['location_name'] ?></td>
                                <td><?= $location['location_archived'] ?></td>
                                <?php if (!isset($_GET['archived'])) { ?>
                                    <td style="max-width: 200px;">
                                        <a href="save_location?l_id=<?= $location['location_id'] ?>" class="btn btn-primary btn-sm d-inline-block"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="archive?l_id=<?= $location['location_id'] ?>&archive=true" class="btn btn-warning btn-sm d-inline-block"><i class="fas fa-archive"></i> Archive</a>
                                    </td>
                                <?php } else { ?>
                                    <td style="max-width: 140px">
                                        <a href="archive?l_id=<?= $location['location_id'] ?>&archive=false" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-box-open"></i> Unarchive</a>
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