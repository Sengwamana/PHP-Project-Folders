<section class="py-5 bg-gray">
    <div class="container py-5">
        <h2 class="lined mb-4">Events</h2> <!-- needs 600x400 image -->
        <div class="row">
            <div class="col mt-3">
                <?php foreach ($events as $event) { ?>
                    <div class="border bg-white p-4 mt-3">
                        <h3 class="font-weight-normal mb-3"><?= $event['event_name'] ?></h3>
                        <div class="mb-2">
                            <?php if ($event['event_image'] == "") { ?>
                                <img src="../img/noimage.jpg" alt="" width="250">
                            <?php } else { ?>
                                <img src="../img/event/<?= $event['event_image'] ?>" alt="" width="250">
                            <?php } ?>
                        </div>
                        <p class="m-0 py-1"><i class="font-weight-bold">Description:</i>&ensp;<span class="font-weight-normal"><?= $event['event_description'] ?></span></p>
                        <p class="m-0 py-1"><i class="font-weight-bold">Event Duration:</i>&ensp;<span class="font-weight-normal text-capitalize"><?= $event['event_duration'] ?></span></p>
                        <p class="m-0 py-1"><i class="font-weight-bold">Event Start Date:</i>&ensp;<span class="font-weight-normal text-capitalize"><?= $event['event_start_date'] ?></span></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>