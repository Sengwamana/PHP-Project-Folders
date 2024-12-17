<?php
$animals2 = $animals->fetchAll();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">View <?= isset($_GET['archived']) ? "Archived" : "" ?> Animals</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php
                foreach ($classifications as $key => $row) { ?>
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
                                        <th scope="col">Lifespan</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Diet Requirement</th>
                                        <th scope="col">Natural Habitat</th>
                                        <th scope="col">Population Distribution</th>
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Height</th>
                                        <th scope="col">Weight</th>
                                        <th scope="col">Archived</th>

                                        <?php if ($tableName == 'mammals') { ?>
                                            <th scope="col">Gestational Period</th>
                                            <th scope="col">Mammal Category</th>
                                            <th scope="col">Body Temperature</th>
                                        <?php } ?>
                                        <?php if ($tableName == 'birds') { ?>
                                            <th scope="col">Nest Construction</th>
                                            <th scope="col">Clutch Size</th>
                                            <th scope="col">Wingspan</th>
                                            <th scope="col">Can Fly</th>
                                            <th scope="col">Color Variant</th>
                                        <?php } ?>
                                        <?php if ($tableName == 'fish') { ?>
                                            <th scope="col">Body Temperature</th>
                                            <th scope="col">Water Type</th>
                                            <th scope="col">Color Variant</th>
                                        <?php } ?>
                                        <?php if ($tableName == 'reptiles' || $tableName == 'amphibians') { ?>
                                            <th scope="col">Reproduction Type</th>
                                            <th scope="col">Clutch Size</th>
                                            <th scope="col">No. of Offspring</th>
                                        <?php } ?>
                                        <?php if ($_SESSION['role'] != "zookeeper") {  ?>
                                            <th scope="col">Actions</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($animals2 as $animal) { ?>
                                        <?php if ($animal['class_id'] == $classId) {
                                            $imageName = $getImageName($animal['animal_id']); ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><img src="../../img/animals/<?= $imageName ?>" alt="" width="100px" style="border-radius: 20px;"></td>
                                                <td><?= $animal['an_given_name'] ?></td>
                                                <td><?= $animal['an_species_name'] ?></td>
                                                <td><?= $animal['an_dob'] ?></td>
                                                <td><?= $animal['an_gender'] ?></td>
                                                <td><?= $animal['an_avg_lifespan'] ?></td>
                                                <td><?php echo $getLocationName($animal['location_id']) ?></td>
                                                <td><?= $animal['an_dietary_req'] ?></td>
                                                <td><?= $animal['an_natural_habitat'] ?></td>
                                                <td><?= $animal['an_pop_dist'] ?></td>
                                                <td><?= $animal['an_joindate'] ?></td>
                                                <td><?= $animal['an_height'] ?></td>
                                                <td><?= $animal['an_weight'] ?></td>
                                                <td><?= $animal['an_archived'] ?></td>

                                                <!-- you can add more classification data here to show animals in tab  -->

                                                <!-- for mammal -->
                                                <?php if ($tableName == 'mammals') {
                                                    $mammal = $getMammalData($animal['animal_id']);
                                                ?>
                                                    <td><?= $mammal['m_gest_period'] ?></td>
                                                    <td><?= $mammal['m_category'] ?></td>
                                                    <td><?= $mammal['m_avg_body_temp'] ?></td>
                                                <?php } ?>

                                                <!-- for bird -->
                                                <?php if ($tableName == 'birds') {
                                                    $bird = $getBirdData($animal['animal_id']);
                                                ?>
                                                    <td><?= $bird['b_nest_const'] ?></td>
                                                    <td><?= $bird['b_clutch_size'] ?></td>
                                                    <td><?= $bird['b_wingspan'] ?></td>
                                                    <td><?= $bird['b_ability_fly'] ?></td>
                                                    <td><?= $bird['b_color_variant'] ?></td>
                                                <?php } ?>

                                                <!-- for fish -->
                                                <?php if ($tableName == 'fish') {
                                                    $fish = $getFishData($animal['animal_id']);
                                                ?>
                                                    <td><?= $fish['f_body_temp'] ?></td>
                                                    <td><?= $fish['f_water_type'] ?></td>
                                                    <td><?= $fish['f_color_variant'] ?></td>
                                                <?php } ?>

                                                <!-- for reptile -->
                                                <?php if ($tableName == 'reptiles') {
                                                    $reptile = $getReptileData($animal['animal_id']);
                                                ?>
                                                    <td><?= $reptile['r_rep_type'] ?></td>
                                                    <td><?= $reptile['r_clutch_size'] ?></td>
                                                    <td><?= $reptile['r_num_offspring'] ?></td>
                                                <?php } ?>

                                                <!-- for amphibians -->
                                                <?php if ($tableName == 'amphibians') {
                                                    $amph = $getAmphibianData($animal['animal_id']);
                                                ?>
                                                    <td><?= $amph['am_rep_type'] ?></td>
                                                    <td><?= $amph['am_clutch_size'] ?></td>
                                                    <td><?= $amph['am_num_offspring'] ?></td>
                                                <?php } ?>

                                                <!-- for other classes add here  -->
                                                <!-- for other classes add here  -->
                                                <?php if ($_SESSION['role'] != "zookeeper") {  ?>

                                                    <?php if (!isset($_GET['archived'])) { ?>
                                                        <td style="min-width: 180px">
                                                            <a href="save_animal?an_id=<?= $animal['animal_id'] ?>" class="btn btn-primary btn-sm d-inline-block"><i class="fas fa-edit"></i> Edit</a>
                                                            <a href="archive_animal?an_id=<?= $animal['animal_id'] ?>" class="btn btn-warning btn-sm d-inline-block"><i class="fas fa-archive"></i> Archive</a>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td style="min-width: 140px">
                                                            <a href="unarchive_animal?an_id=<?= $animal['animal_id'] ?>" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-box-open"></i> Unarchive</a>
                                                        </td>
                                                    <?php } ?>
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