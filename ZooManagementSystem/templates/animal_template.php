<?php
$images2 = $images->fetchAll();
?>
<section class="bg-gray p-3">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 mt-4">
                <h2 class="lined"><?= $animal['an_given_name'] ?></h2>

                <div class="animal-carousel mt-5" style="max-width: 50vw">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php foreach ($images2 as $key => $row) { ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" <?= $key == 0 ? 'class="active"' : "" ?>></li>
                            <?php } ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php foreach ($images2 as $key => $image) { ?>
                                <div class="carousel-item <?= $key == 0 ? "active" : "" ?>">
                                    <img src="../img/animals/<?= $image['image_name'] ?>" class="d-block w-50 m-auto" alt="...">
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev carousel-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next carousel-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="mt-5">
                    <h4 class="text-secondary">Details</h4>
                    <div class="row mt-4">
                        <div class="col-6">
                            <h6 class="my-2"><span class="text-muted">Given name:</span>&ensp;<?= $animal['an_given_name'] ?></h6>
                            <h6 class="my-2"><span class="text-muted">Species name:</span>&ensp;<?= $animal['an_species_name'] ?></h6>
                            <h6 class="my-2"><span class="text-muted">Date of birth:</span>&ensp;<?= $animal['an_dob'] ?></h6>
                            <h6 class="my-2"><span class="text-muted">Gender:</span>&ensp;<?= $animal['an_gender'] == "m" ? "Male" : "Female" ?></h6>
                            <h6 class="my-2"><span class="text-muted">Average Lifespan:</span>&ensp;<?= $animal['an_avg_lifespan'] ?></h6>
                            <h6 class="my-2"><span class="text-muted">Location:</span>&ensp;<?= $getLocationName($animal['location_id']) ?></h6>
                            <h6 class="my-2"><span class="text-muted">Dietary Requirements:</span>&ensp;<?= $animal['an_dietary_req'] ?></h6>
                            <h6 class="my-2"><span class="text-muted">Natural Habitat:</span>&ensp;<?= $animal['an_natural_habitat'] ?></h6>
                            <h6 class="my-2"><span class="text-muted">Population Distribution:</span>&ensp;<?= $animal['an_pop_dist'] ?></h6>
                            <h6 class="my-2"><span class="text-muted">Zoo join date:</span>&ensp;<?= $animal['an_joindate'] ?></h6>
                        </div>
                        <div class="col-6">
                            <h6 class="my-2"><span class="text-muted">Height:</span>&ensp;<?= $animal['an_height'] ?></h6>
                            <h6 class="my-2"><span class="text-muted">Weight:</span>&ensp;<?= $animal['an_weight'] ?></h6>
                            <h6 class="my-2"><span class="text-muted">Classification:</span>&ensp;<?= $getClassName($animal['class_id']) ?></h6>
                            <?php if ($class['class_table_name'] == "mammals") { ?>
                                <h6 class="my-2"><span class="text-muted">Gestational Period:</span>&ensp;<?= $childDetails['m_gest_period'] ?></h6>
                                <h6 class="my-2"><span class="text-muted">Mammal Category:</span>&ensp;<?= $childDetails['m_category'] ?></h6>
                                <h6 class="my-2"><span class="text-muted">Average Body Temperature:</span>&ensp;<?= $childDetails['m_avg_body_temp'] ?></h6>
                            <?php } ?>
                            <?php if ($class['class_table_name'] == "birds") { ?>
                                <h6 class="my-2"><span class="text-muted">Nest Construction Method:</span>&ensp;<?= $childDetails['b_nest_const'] ?></h6>
                                <h6 class="my-2"><span class="text-muted">Clutch Size:</span>&ensp;<?= $childDetails['b_clutch_size'] ?></h6>
                                <h6 class="my-2"><span class="text-muted">Wingspan:</span>&ensp;<?= $childDetails['b_wingspan'] ?></h6>
                                <h6 class="my-2"><span class="text-muted">Ability to Fly:</span>&ensp;<?= $childDetails['b_ability_fly'] ?></h6>
                                <h6 class="my-2"><span class="text-muted">Plumage Color Variant:</span>&ensp;<?= $childDetails['b_color_variant'] ?></h6>
                            <?php } ?>
                            <?php if ($class['class_table_name'] == "fish") { ?>
                                <h6 class="my-2"><span class="text-muted">Average Body Temperature:</span>&ensp;<?= $childDetails['f_body_temp'] ?></h6>
                                <h6 class="my-2"><span class="text-muted">Water Type:</span>&ensp;<?= $childDetails['f_water_type'] ?></h6>
                                <h6 class="my-2"><span class="text-muted">Color Variants:</span>&ensp;<?= $childDetails['f_color_variant'] ?></h6>
                            <?php } ?>

                            <?php if ($class['class_table_name'] == "reptiles" || $class['class_table_name'] == "amphibians") { ?>
                                <h6 class="my-2"><span class="text-muted">Reproduction Type:</span>&ensp;<?= isset($childDetails['r_rep_type']) ? $childDetails['r_rep_type'] :  $childDetails['am_rep_type'] ?></h6>
                                <h6 class="my-2"><span class="text-muted">Average Clutch Size:</span>&ensp;<?= isset($childDetails['r_clutch_size']) ? $childDetails['r_clutch_size'] :  $childDetails['am_clutch_size']  ?></h6>
                                <h6 class="my-2"><span class="text-muted">Average Number of Offsprings:</span>&ensp;<?= isset($childDetails['r_num_offspring']) ? $childDetails['r_num_offspring'] :  $childDetails['am_num_offspring'] ?></h6>
                            <?php } ?>

                            <?php if ($animal['an_description'] != "") { ?>
                                <h6 class="my-2"><span class="text-muted">Description:</span>&ensp;<?= $animal['an_description'] ?></h6>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="w-50 mx-auto mt-5">
                    <?php if ($sponsored == false) { ?>
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "sponsor") { ?>
                            <h5 class="text-center font-weight-light">Animal available for sponsorship</h5>
                            <a href="sponsor_animal?an_id=<?= $animal['animal_id'] ?>" class="btn btn-block btn-primary">Sponsor Animal</a>
                        <?php } else { ?>
                            <h5 class="text-center font-weight-light">Animal available for sponsorship</h5>
                            <button class="btn btn-block btn-outline-danger" disabled>Sponsor account required</button>
                        <?php } ?>
                    <?php } else { ?>
                        <div>
                            <h2 class="text-center font-weight-light mb-3">Animal Sponsored By</h2>
                            <a href="https://<?=$sponsorDetails['s_url']?>" target="_blank">
                                <img src="../img/sponsor_image/<?= $sponsorDetails['signage_photo'] ?>" alt="" width="600">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>