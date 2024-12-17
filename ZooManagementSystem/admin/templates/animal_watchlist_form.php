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
            <h1 class="h3 mb-4 text-gray-800">Add Animal to Watchlist</h1>
            <form action="" method="post">
                <div class="mb-4 field-required">
                    <label for="select_animal">Select Animal</label>
                    <select class="custom-select d-block w-100" name="animal_id" id="select_animal" required>
                        <?php foreach ($animals as $animal) { ?>
                            <option value="<?= $animal['animal_id'] ?>">
                                <?= $animal['an_given_name'] . '&ensp;-&ensp;' . $getClassName($animal['class_id']) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-4 field-required">
                    <label for="issue">Describe the Issue</label>
                    <textarea name="watch_description" placeholder="...." class="form-control" id="issue" cols="30" rows="5" required></textarea>
                </div>
                <div class="mb-4 field-required">
                    <label for="severity">Select Severity</label>
                    <select class="custom-select d-block w-100" name="watch_severity" id="severity" required>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Add to Watchlist</button>
            </form>
        </div>
    </div>
</div>