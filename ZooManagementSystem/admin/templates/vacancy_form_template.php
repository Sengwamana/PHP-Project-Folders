<div class="container">
    <div class="row pb-5">
        <div class="col-md-8 order-md-1">
            <?php
            if (isset($_GET['msg'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            ?>
            <h1 class="h3 mb-4 text-gray-800"><?= isset($_GET['vacancy_id']) ? "Edit" : "Add"  ?> Vacancy</h1>
            <form action="" method="post">
                <input type="hidden" name="vacancy_id" value="<?php if (isset($vacancy['vacancy_id'])) echo $vacancy['vacancy_id']  ?>">
                <div class="mb-4 field-required">
                    <label for="class_display_name">Position</label>
                    <input type="text" value="<?= isset($vacancy['v_position']) ? $vacancy['v_position'] : ""  ?>" class="form-control" id="class_display_name" placeholder="Eg: Receptionist" name="v_position" required>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_description">Description</label>
                    <textarea name="v_description" placeholder="...." class="form-control" id="v_description" cols="30" rows="5" required><?= isset($vacancy['v_description']) ? $vacancy['v_description'] : "" ?></textarea>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_type">Vacancy Type</label>
                    <select class="custom-select d-block w-100" name="v_type" id="v_type" required <?php if (isset($vacancy['vacancy_id'])) echo 'data-value="" onfocus="this.setAttribute(\'data-value\', this.value);" onchange="this.value = this.getAttribute(\'data-value\');"' ?>>
                        <option value="permanent" <?= isset($vacancy['v_type']) && $vacancy['v_type'] == "permanent" ? "selected" : ""  ?>>Permanent</option>;
                        <option value="temporary" <?= isset($vacancy['v_type']) && $vacancy['v_type'] == "temporary" ? "selected" : ""  ?>>Temporary</option>;
                    </select>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_start_date">Contract Start Date</label>
                    <input type="date" value="<?= isset($vacancy['v_start_date']) ? $vacancy['v_start_date'] : "" ?>" class="form-control" name="v_start_date" id="v_start_date" required>
                </div>
                <div class="mb-4">
                    <label for="v_end_date">Contract End Date</label>
                    <input type="date" value="<?= isset($vacancy['v_end_date']) ? $vacancy['v_end_date'] : "" ?>" class="form-control" name="v_end_date" id="v_end_date">
                    <small>For temporary vacancy</small>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"><?= isset($_GET['vacancy_id']) ? "Edit" : "Add"  ?> Vacancy</button>
            </form>
        </div>
    </div>
</div>