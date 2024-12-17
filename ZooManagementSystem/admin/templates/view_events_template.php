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
            <h1 class="h3 mb-4 text-gray-800">View <?= isset($_GET['archived']) ? "Archived" : "" ?> Events</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" style="min-width: 600px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Event Image</th>
                            <th scope="col">Event Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Event Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $key => $event) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td>
                                    <?php if ($event['event_image'] != "") { ?>
                                        <img src="../../img/event/<?= $event['event_image'] ?>" alt="" width="100px" style="border-radius: 20px;">
                                    <?php } ?>
                                </td>
                                <td><?= $event['event_name'] ?></td>
                                <td><?= $event['event_description'] ?></td>
                                <td><?= $event['event_start_date'] ?></td>
                                <?php if (!isset($_GET['archived'])) { ?>
                                    <td style="max-width: 200px;">
                                        <a href="save_event?event_id=<?= $event['event_id'] ?>" class="btn btn-primary btn-sm d-inline-block"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="archive?arc_event_id=<?= $event['event_id'] ?>&event_archive=true" class="btn btn-warning btn-sm d-inline-block"><i class="fas fa-archive"></i> Archive</a>
                                    </td>
                                <?php } else { ?>
                                    <td style="max-width: 140px">
                                        <a href="archive?arc_event_id=<?= $event['event_id'] ?>&event_archive=false" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-box-open"></i> Unarchive</a>
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