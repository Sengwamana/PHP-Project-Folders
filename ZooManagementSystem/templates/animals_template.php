<section class="bg-gray p-3">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 text-center mt-4">
                <h2 class="text-left lined"><?= $getClassName($_GET['class_id']) ?></h2>
                <div class="row justify-content-left mt-4">

                    <?php foreach ($animals as $key => $animal) { ?>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-xl-3 my-2">
                            <a href="animal?an_id=<?= $animal['animal_id'] ?>" class="product-class-link">
                                <div class="card product-card">
                                    <img src="../img/animals/<?= $getImageName($animal['animal_id']) ?>" alt="" class="card-img-top animal-image-style" />
                                    <div class="card-body pt-2">
                                        <hr class="mt-0" />
                                        <h5 class="card-title font-weight-bold color-header"><?= $animal['an_given_name'] ?></h5>
                                        <p class="card-text">Species name: <?= $animal['an_species_name'] ?> </p>
                                    </div>
                                    <div class="card-footer text-muted card-footer-address">
                                        <div class="d-flex justify-content-between">
                                            <span><?= $animal['an_gender'] == "m" ? "Male":"Female" ?></span>
                                            <span>DOB <?= $animal['an_dob'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>