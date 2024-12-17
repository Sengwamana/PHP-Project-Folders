<div class="container">
    <div class="row pb-5">
        <div class="col-md-8 order-md-1">
            <?php
            if (isset($_GET['msg'])) {
                echo '<div class="alert alert-' . $_GET['type'] . ' alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            ?>
            <h1 class="h3 mb-4 text-gray-800"><?= isset($_GET['an_id']) ? "Edit" : "Add"  ?> Animal</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="animal_id" value="<?php if (isset($animal['animal_id'])) echo $animal['animal_id']  ?>">
                <div class="row">
                    <div class="col-md-6 mb-4 field-required">
                        <label for="givenname">Given name</label>
                        <input type="text" class="form-control" id="givenname" name="an_given_name" placeholder="" value="<?= isset($animal['an_given_name']) ? $animal['an_given_name'] : "" ?>" required>
                    </div>
                    <div class="col-md-6 mb-4 field-required">
                        <label for="speciesname">Species Name</label>
                        <input type="text" class="form-control" id="speciesname" name="an_species_name" placeholder="" value="<?= isset($animal['an_species_name']) ? $animal['an_species_name'] : "" ?>" required>
                    </div>
                </div>

                <div class="mb-4 field-required">
                    <label for="dob">Date of Birth</label>
                    <input type="date" value="<?= isset($animal['an_dob']) ? $animal['an_dob'] : "" ?>" class="form-control" name="an_dob" id="dob" required>
                </div>

                <div class="mb-4 field-required">
                    <label for="gender">Gender</label>
                    <select class="custom-select d-block w-100" name="an_gender" id="gender" required>
                        <option value="m" <?= isset($animal['an_gender']) && $animal['an_gender'] == "m" ? "selected" : ""  ?>>Male</option>
                        <option value="f" <?= isset($animal['an_gender']) && $animal['an_gender'] == "f" ? "selected" : ""  ?>>Female</option>
                    </select>
                </div>

                <div class="mb-4 field-required">
                    <label for="lifespan">Average Lifespan</label>
                    <input type="text" value="<?= isset($animal['an_avg_lifespan']) ? $animal['an_avg_lifespan'] : ""  ?>" class="form-control" id="lifespan" placeholder="Eg: 2 Years, 1.5 Years" name="an_avg_lifespan" required>
                </div>

                <div class="mb-4 field-required">
                    <label for="classification">Species Category</label>
                    <select class="custom-select d-block w-100" name="class_id" id="classification" required <?php if (isset($animal['class_id'])) echo 'data-value="" onfocus="this.setAttribute(\'data-value\', this.value);" onchange="this.value = this.getAttribute(\'data-value\');"' ?>>
                        <?php
                        foreach ($classifications as $row) {
                            $displayName = $row['class_display_name'];
                            $classId = $row['class_id'];
                        ?>
                            <option value="<?= $classId ?>" <?= isset($animal['class_id']) && $animal['class_id'] == $classId ? "selected" : ""  ?>><?= $displayName ?></option>";
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-4 field-required">
                    <label for="location">Location</label>
                    <select class="custom-select d-block w-100" name="location_id" id="location" required>
                        <?php
                        foreach ($locations as $row) {
                            $locationName = $row['location_name'];
                            $locationId = $row['location_id'];
                        ?>
                            <option value="<?= $locationId ?>" <?= isset($animal['location_id']) && $animal['location_id'] == $locationId ? "selected" : ""  ?>><?= $locationName ?></option>";
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-4 field-required">
                    <label for="dietary">Dietary Requirement</label>
                    <input type="text" value="<?= isset($animal['an_dietary_req']) ? $animal['an_dietary_req'] : "" ?>" class="form-control" id="dietary" placeholder="Eg: About 1.5 KGs of meat a day" name="an_dietary_req" required>
                </div>

                <div class="mb-4 field-required">
                    <label for="natural_habitat">Natural Habitat</label>
                    <input type="text" value="<?= isset($animal['an_natural_habitat']) ? $animal['an_natural_habitat'] : "" ?>" class="form-control" id="natural_habitat" placeholder="Eg: Wetlands" name="an_natural_habitat" required>
                </div>

                <div class="mb-4 field-required">
                    <label for="popn_dist">Population Distribution</label>
                    <input type="text" value="<?= isset($animal['an_pop_dist']) ? $animal['an_pop_dist'] : "" ?>" class="form-control" id="popn_dist" placeholder="" name="an_pop_dist" required>
                </div>

                <div class="mb-4 field-required">
                    <label for="joindate">Zoo Join Date</label>
                    <input type="date" value="<?= isset($animal['an_joindate']) ? $animal['an_joindate'] : "" ?>" class="form-control" name="an_joindate" id="joindate" required>
                </div>

                <div class="mb-4 field-required">
                    <label for="height">Animal Height</label>
                    <input type="number" value="<?= isset($animal['an_height']) ? $animal['an_height'] : "" ?>" class="form-control" id="height" placeholder="" name="an_height" min="0" required step="0.01">
                    <small class="text-muted">In meters</small>
                </div>

                <div class="mb-4 field-required">
                    <label for="weight">Animal Weight</label>
                    <input type="number" value="<?= isset($animal['an_weight']) ? $animal['an_weight'] : "" ?>" class="form-control" id="weight" placeholder="" name="an_weight" min="0" required step="0.01">
                    <small class="text-muted">In KG</small>
                </div>

                <div class="mb-4">
                    <label for="description">Description for Signage</label>
                    <textarea name="an_description" placeholder="...." class="form-control" id="description" cols="30" rows="5"><?= isset($animal['an_description']) ? $animal['an_description'] : "" ?></textarea>
                </div>
                <hr class="mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="archived" name="an_archived" value="true" <?= isset($animal['an_archived']) && $animal['an_archived'] == "true" ? "checked" : "" ?>>
                    <label class="custom-control-label" for="archived">Archived</label>
                </div>
                <hr class="mb-4">

                <div class="form-group mb-4">
                    <label for="file">Select Images</label><br />
                    <input type="file" name="images[]" className="form-control-file" id="file" accept="image/*" multiple <?= isset($_GET['an_id']) ? "" : "required"  ?> />
                </div>

                <h4 class="text-muted mb-4">Animal Case History</h4>
                <div class="mb-4">
                    <label for="an_med_record">Animal Medical Record</label>
                    <textarea name="an_med_record" placeholder="...." class="form-control" id="an_med_record" cols="30" rows="5"><?= isset($animal['an_med_record']) ? $animal['an_med_record'] : "" ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="an_transfer">Date and Destination of Animal Transfer from Claybrook</label>
                    <input type="text" value="<?= isset($animal['an_transfer']) ? $animal['an_transfer'] : "" ?>" class="form-control" id="an_transfer" placeholder="" name="an_transfer">
                </div>
                <div class="mb-4">
                    <label for="an_transfer_reason">Reason of Animal Transfer from Claybrook</label>
                    <input type="text" value="<?= isset($animal['an_transfer_reason']) ? $animal['an_transfer_reason'] : "" ?>" class="form-control" id="an_transfer_reason" placeholder="" name="an_transfer_reason">
                </div>
                <div class="mb-4">
                    <label for="an_death_date">Date of animal death</label>
                    <input type="date" value="<?= isset($animal['an_death_date']) ? $animal['an_death_date'] : "" ?>" class="form-control" name="an_death_date" id="an_death_date">
                </div>
                <div class="mb-4">
                    <label for="an_death_cause">Animal Death Cause(s)</label>
                    <textarea name="an_death_cause" placeholder="...." class="form-control" id="an_death_cause" cols="30" rows="5"><?= isset($animal['an_death_cause']) ? $animal['an_death_cause'] : "" ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="an_incineration">Animal Remains Incineration Date and Location</label>
                    <input type="text" value="<?= isset($animal['an_incineration']) ? $animal['an_incineration'] : "" ?>" class="form-control" id="an_incineration" placeholder="" name="an_incineration">
                </div>


                <h4 class="text-muted mb-4">Classification Specific Details</h4>

                <h5 class="font-weight-bold">Mammals</h5>

                <div class="mb-4">
                    <label for="gast_per">Gestational Period</label>
                    <input type="text" value="<?= isset($child['m_gest_period']) ? $child['m_gest_period'] : "" ?>" class="form-control" id="gast_per" placeholder="" name="m_gest_period">
                </div>

                <div class="mb-4">
                    <label for="m_category">Mammal Category</label>
                    <input type="text" value="<?= isset($child['m_category']) ? $child['m_category'] : "" ?>" class="form-control" id="m_category" placeholder="Eg: Prototheria, Metatheria" name="m_category">
                </div>

                <div class="mb-4">
                    <label for="avg_temp">Average Body Temperature</label>
                    <input type="number" value="<?= isset($child['m_avg_body_temp']) ? $child['m_avg_body_temp'] : "" ?>" class="form-control" id="avg_temp" placeholder="Eg: 12.6" name="m_avg_body_temp" min="0" step="0.01">
                    <small class="text-muted">In Celcius</small>
                </div>

                <h5 class="font-weight-bold">Birds</h5>

                <div class="mb-4">
                    <label for="b_nest_const">Nest Construction Method</label>
                    <input type="text" value="<?= isset($child['b_nest_const']) ? $child['b_nest_const'] : "" ?>" class="form-control" id="b_nest_const" placeholder="" name="b_nest_const">
                </div>

                <div class="mb-4">
                    <label for="b_clutch_size">Clutch Size</label>
                    <input type="number" value="<?= isset($child['b_clutch_size']) ? $child['b_clutch_size'] : "" ?>" class="form-control" id="b_clutch_size" placeholder="" name="b_clutch_size" min="0" step="0.01">
                    <small class="text-muted">In CM</small>
                </div>

                <div class="mb-4">
                    <label for="b_wingspan">Wingspan</label>
                    <input type="number" value="<?= isset($child['b_wingspan']) ? $child['b_wingspan'] : "" ?>" class="form-control" id="b_wingspan" placeholder="" name="b_wingspan" min="0" step="0.01">
                    <small class="text-muted">In Inch</small>
                </div>

                <div class="mb-4">
                    <label>Ability to Fly</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="a-yes" name="b_ability_fly" class="custom-control-input" value="yes" <?= isset($child['b_ability_fly']) && $child['b_ability_fly'] == "yes" ? "checked" : "" ?>>
                        <label class="custom-control-label" for="a-yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="a-no" name="b_ability_fly" class="custom-control-input" value="no" <?= isset($child['b_ability_fly']) && $child['b_ability_fly'] == "no" ? "checked" : "" ?>>
                        <label class="custom-control-label" for="a-no">No</label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="b_color_variant">Plumage Color Variants</label>
                    <input type="text" value="<?= isset($child['b_color_variant']) ? $child['b_color_variant'] : "" ?>" class="form-control" id="b_color_variant" placeholder="" name="b_color_variant">
                </div>

                <h5 class="font-weight-bold">Fish</h5>

                <div class="mb-4">
                    <label for="f_body_temp">Average Body Temperature</label>
                    <input type="number" value="<?= isset($child['f_body_temp']) ? $child['f_body_temp'] : "" ?>" class="form-control" id="f_body_temp" placeholder="" name="f_body_temp" min="0" step="0.01">
                    <small class="text-muted">In Celcius</small>
                </div>

                <div class="mb-4">
                    <label for="f_water_type">Water Type</label>
                    <input type="text" value="<?= isset($child['f_water_type']) ? $child['f_water_type'] : "" ?>" class="form-control" id="f_water_type" placeholder="Eg: Salt, Fresh" name="f_water_type">
                </div>

                <div class="mb-4">
                    <label for="f_color_variant">Color Variants</label>
                    <input type="text" value="<?= isset($child['f_color_variant']) ? $child['f_color_variant'] : "" ?>" class="form-control" id="f_color_variant" placeholder="" name="f_color_variant">
                </div>

                <h5 class="font-weight-bold">Reptiles & Amphibians</h5>

                <div class="mb-4">
                    <label for="rep_type">Reproduction Type</label>
                    <input type="text" value="<?= isset($child['am_rep_type']) ? $child['am_rep_type'] : (isset($child['r_rep_type']) ? $child['r_rep_type'] : "") ?>" class="form-control" id="rep_type" placeholder="Eg: Egg layer, Livebearer" name="rep_type">
                </div>

                <div class="mb-4">
                    <label for="clutch_size">Average Clutch Size</label>
                    <input type="number" value="<?= isset($child['am_clutch_size']) ? $child['am_clutch_size'] : (isset($child['r_clutch_size']) ? $child['r_clutch_size'] : "") ?>" class="form-control" id="clutch_size" placeholder="" name="clutch_size" step="0.01">
                </div>

                <div class="mb-4">
                    <label for="num_offspring">Average Number of Offspring</label>
                    <input type="number" value="<?= isset($child['am_num_offspring']) ? $child['am_num_offspring'] : (isset($child['r_num_offspring']) ? $child['r_num_offspring'] : "") ?>" class="form-control" id="num_offspring" placeholder="" name="num_offspring">
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"><?= isset($_GET['an_id']) ? "Edit" : "Add"  ?> Animal</button>
            </form>
        </div>
    </div>
</div>