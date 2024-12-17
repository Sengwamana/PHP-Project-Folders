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
            <h1 class="h3 mb-4 text-gray-800"><?= isset($_GET['event_id']) ? "Edit" : "Add"  ?> Event</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="event_id" value="<?php if (isset($event['event_id'])) echo $event['event_id']  ?>">
                <div class="mb-4 field-required">
                    <label for="class_display_name">Event Name</label>
                    <input type="text" value="<?= isset($event['event_name']) ? $event['event_name'] : ""  ?>" class="form-control" id="class_display_name" placeholder="" name="event_name" required>
                </div>
                <div class="mb-4 field-required">
                    <label for="v_description">Description</label>
                    <textarea name="event_description" placeholder="...." class="form-control" id="v_description" cols="30" rows="5" required><?= isset($event['event_description']) ? $event['event_description'] : "" ?></textarea>
                </div>
                <div class="mb-4 field-required">
                    <label for="event_duration">Event Duration</label>
                    <input type="text" value="<?= isset($event['event_duration']) ? $event['event_duration'] : ""  ?>" class="form-control" id="event_duration" placeholder="" name="event_duration" required>
                </div>
                <div class="form-group mb-4">
                    <label for="file">Select Image</label><br/>
                    <input type="file" name="image" className="form-control-file" id="file" accept="image/*" />
                </div>
                <div class="mb-4 field-required">
                    <label for="v_start_date">Event Start Date</label>
                    <input type="date" value="<?= isset($event['event_start_date']) ? $event['event_start_date'] : "" ?>" class="form-control" name="event_start_date" id="v_start_date" required>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"><?= isset($_GET['event_id']) ? "Edit" : "Add"  ?> Event</button>
            </form>
        </div>
    </div>
</div>