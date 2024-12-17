<?php
$animals2 = $animals->fetchAll();
$classifications2 = $classifications->fetchAll();
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
            <h1 class="h3 mb-4 text-gray-800">Set Animal of the Week</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php
                foreach ($classifications2 as $key => $row) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($key == 0) echo "active" ?>" data-toggle="tab" href="#<?php echo $row['class_table_name'] ?>" role="tab"><?php echo $row['class_display_name']; ?></a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content" id="myTabContent">
                <?php
                foreach ($classifications2 as $key => $class) { ?>
                    <div class="tab-pane fade <?php if ($key == 0) echo "show active" ?>" id="<?php echo $class['class_table_name'] ?>" role="tabpanel">
                        <?php
                        $classId = $class['class_id'];
                        $tableName = $class['class_table_name'];
                        ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Species Name</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($animals2 as $animal) { ?>
                                        <?php if ($animal['class_id'] == $classId) {
                                            $imageName = $getImageName($animal['animal_id']);
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><img src="../../img/animals/<?= $imageName ?>" alt="" width="120px" style="border-radius: 20px;"></td>
                                                <td><?= $animal['an_given_name'] ?></td>
                                                <td><?= $animal['an_species_name'] ?></td>
                                                <td><?= $animal['an_dob'] ?></td>
                                                <td><?= $animal['an_gender'] ?></td>
                                                <td><?= $animal['an_joindate'] ?></td>
                                                <td>
                                                    <a href="archive?set_an_week=<?= $animal['animal_id'] ?>" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-trophy"></i>&emsp;Set Animal of the Week</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php   } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                <?php } ?>
            </div>

            <div class="mt-4">
                <div class="card mb-4">
                    <div class="card-header h5 text-gray-800 font-weight-bold">
                        Current Animal of the Week
                    </div>
                    <div class="card-body d-flex">
                        <?php if ($currAnimal != null) { ?>
                            <div class="text-center">
                                <img src="../../img/animals/<?= $getImageName($currAnimal['animal_id']) ?>" alt="" width="60%" style="border-radius: 20px">
                            </div>
                            <div>
                                <h6> <span class="text-muted">Given name:</span>&ensp;<?= $currAnimal['an_given_name'] ?></h6>
                                <h6> <span class="text-muted">Species name:</span>&ensp;<?= $currAnimal['an_species_name'] ?></h6>
                                <h6> <span class="text-muted">Date of birth:</span>&ensp;<?= $currAnimal['an_dob'] ?></h6>
                                <h6> <span class="text-muted">Gender:</span>&ensp;<?= $currAnimal['an_gender'] == "m" ? "Male":"Female" ?></h6>
                                <h6> <span class="text-muted">Zoo join date:</span>&ensp;<?= $currAnimal['an_joindate'] ?></h6>
                            </div>
                        <?php } else { ?>
                            Animal of the week not set
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>