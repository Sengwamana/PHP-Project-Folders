<?php
$badge = [
    'high' => 'danger',
    'medium' => 'warning',
    'low' => 'success'
];
?>
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
            } ?>
            <h1 class="h3 mb-4 text-gray-800">View <?= isset($_GET['attended']) ? "Attended" : "" ?> Watchlist</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" style="min-width: 600px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Given Name</th>
                            <th scope="col">Classification</th>
                            <th scope="col">Issue</th>
                            <th scope="col">Severity</th>
                            <th scope="col">Date Issued</th>
                            <th scope="col">Attended</th>
                            <?php if ($_SESSION['role'] != "zookeeper") {  ?>
                                <th scope="col">Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($watchlists as $key => $watchlist) {
                            $animal = $getAnimalData($watchlist['animal_id']);
                            $className = $getClassName($animal['class_id']);
                            $imageName = $getImageName($animal['animal_id']);
                        ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><img src="../../img/animals/<?= $imageName ?>" alt="" width="100px" style="border-radius: 20px;"></td>
                                <td><?= $animal['an_given_name'] ?></td>
                                <td><?= $className ?></td>
                                <td><?= $watchlist['watch_description'] ?></td>
                                <td><span class="badge p-2 badge-<?= $badge[$watchlist['watch_severity']] ?>"><?= $watchlist['watch_severity'] ?></span></td>
                                <td><?= $watchlist['watch_date'] ?></td>
                                <td><?= $watchlist['watch_attended'] ?></td>
                                <?php if ($_SESSION['role'] != "zookeeper") {  ?>

                                    <?php if (!isset($_GET['attended'])) { ?>
                                        <td>
                                            <a href="archive?attend_watch=<?= $watchlist['watch_id'] ?>&watch_value=true" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-user-nurse"></i> Mark Attended</a>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <a href="archive?attend_watch=<?= $watchlist['watch_id'] ?>&watch_value=false" class="btn btn-danger btn-sm d-inline-block"><i class="fas fa-user-times"></i> Mark Unattended</a>
                                        </td>
                                    <?php } ?>
                                <?php } ?>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>