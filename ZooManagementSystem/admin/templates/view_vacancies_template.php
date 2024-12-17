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
            <h1 class="h3 mb-4 text-gray-800">View Active Vacancies</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" style="min-width: 700px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Position</th>
                            <th scope="col">Description</th>
                            <th scope="col">Contract Type</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vacancies as $key => $vacancy) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $vacancy['v_position'] ?></td>
                                <td><?= $vacancy['v_description'] ?></td>
                                <td class="text-capitalize"><?= $vacancy['v_type'] ?></td>
                                <td><?= $vacancy['v_start_date'] ?></td>
                                <td><?= $vacancy['v_end_date'] == "0000-00-00" ? "N/A" : $vacancy['v_end_date'] ?></td>
                                <td>
                                    <a href="save_vacancy?vacancy_id=<?= $vacancy['vacancy_id'] ?>" class="btn btn-primary btn-sm d-inline-block"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="archive?vacancy_id=<?= $vacancy['vacancy_id']   ?>" class="btn btn-warning btn-sm d-inline-block"><i class="fas fa-archive"></i> Archive</a>
                                </td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>