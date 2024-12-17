<section class="py-5 bg-gray">
    <div class="container py-5">
        <h2 class="lined mb-4">Vacancies</h2> <!-- needs 600x400 image -->
        <p class="lead">Following jobs are available in Zoo</p>
        <div class="row">
            <div class="col mt-3">
                <?php foreach ($vacancies as $key => $vacancy) { ?>
                    <div class="border bg-white p-4 mt-3">
                        <h3 class="font-weight-normal"><?= $vacancy['v_position'] ?></h3>
                        <p class="m-0 py-1"><i class="font-weight-bold">Description:</i>&ensp;<span class="font-weight-normal"><?= $vacancy['v_description'] ?></span></p>
                        <p class="m-0 py-1"><i class="font-weight-bold">Job Type:</i>&ensp;<span class="font-weight-normal text-capitalize"><?= $vacancy['v_type'] ?></span></p>
                        <p class="m-0 py-1"><i class="font-weight-bold">Job Start Date:</i>&ensp;<span class="font-weight-normal text-capitalize"><?= $vacancy['v_start_date'] ?></span></p>
                        <?php if ($vacancy['v_type'] == 'temporary') { ?>
                            <p class="m-0 py-1"><i class="font-weight-bold">Job End Date:</i>&ensp;<span class="font-weight-normal text-capitalize"><?= $vacancy['v_end_date'] ?></span></p>
                        <?php } ?>
                        <div class="text-right">
                            <a class="btn btn-primary" href="apply_vacancy?vac_id=<?= $vacancy['vacancy_id'] ?>">Apply</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>