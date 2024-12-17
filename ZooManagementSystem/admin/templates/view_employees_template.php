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
            <h1 class="h3 mb-4 text-gray-800">View <?= isset($_GET['archived']) ? "Archived" : "" ?> Employees</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" style="min-width: 700px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Position</th>
                            <th scope="col">Contract Type</th>
                            <th scope="col">Contract Start Date</th>
                            <th scope="col">Contract End Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $key => $employee) {
                            $app = $getApplication($employee['application_id']);
                            $vac = $getVacancy($employee['vacancy_id']);
                        ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $app['a_fullname'] ?></td>
                                <td><?= $app['a_email'] ?></td>
                                <td><?= $app['a_phone'] ?></td>
                                <td><?= $vac['v_position'] ?></td>
                                <td><span class="text-capitalize"><?= $vac['v_type'] ?></span></td>
                                <td><?= $vac['v_start_date'] ?></td>
                                <td><?= $vac['v_end_date'] == "0000-00-00" ? "N/A" : $vac['v_end_date'] ?></td>
                                <?php if (!isset($_GET['archived'])) { ?>
                                    <td>
                                        <a href="archive?ar_emp_id=<?= $employee['e_id'] ?>&archive=true" class="btn btn-warning btn-sm d-inline-block"><i class="fas fa-archive"></i> Archive</a>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <a href="archive?ar_emp_id=<?= $employee['e_id'] ?>&archive=false" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-box-open"></i> Unarchive</a>
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