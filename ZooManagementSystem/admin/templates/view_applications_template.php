<?php
$applications = $applications_pdo->fetchAll();
$classes = [
    ['type' => 'unreviewed'],
    ['type' => 'accepted'],
    ['type' => 'rejected']
]
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
            }
            ?>
            <h1 class="h3 mb-4 text-gray-800">View Job Applications</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <!-- <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#unreviewed" role="tab">Unreviewed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#accepted" role="tab">Accepted</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#rejected" role="tab">Rejected</a>
                </li> -->
                <?php
                foreach ($classes as $key => $row) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($key == 0) echo "active" ?>" data-toggle="tab" href="#<?php echo $row['type'] ?>" role="tab"><span class="text-capitalize"><?= $row['type']; ?></span></a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content" id="myTabContent">
                <?php
                foreach ($classes as $key => $class) { ?>
                    <div class="tab-pane fade <?php if ($key == 0) echo "show active" ?>" id="<?php echo $class['type'] ?>" role="tabpanel">

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Applicant Fullname</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">CV</th>
                                        <th scope="col">Applied Position</th>
                                        <th scope="col">Actions/Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($applications as $app) { ?>
                                        <?php if ($app['a_status'] == $class['type']) { ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><?= $app['a_fullname'] ?></td>
                                                <td><?= $app['a_email'] ?></td>
                                                <td><?= $app['a_phone'] ?></td>
                                                <td><a href="../../files/cv/<?= $app['a_cv'] ?>" class="btn btn-secondary">Download</a></td>
                                                <td><?= $getVacancyPosition($app['vacancy_id']) ?></td>
                                                <!-- for other classes add here  -->
                                                <!-- for other classes add here  -->
                                                <?php if ($class['type'] == 'unreviewed') { ?>
                                                    <td>
                                                        <a href="archive?review_app_id=<?= $app['application_id'] ?>&app_vacancy_id=<?= $app['vacancy_id'] ?>&a_status=accepted" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-check"></i> Accept</a>
                                                        <a href="archive?review_app_id=<?= $app['application_id'] ?>&app_vacancy_id=<?= $app['vacancy_id'] ?>&a_status=rejected" class="btn btn-danger btn-sm d-inline-block"><i class="fas fa-times"></i> Reject</a>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <span class="text-capitalize"><?= $app['a_status'] ?></span>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    <?php   } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>