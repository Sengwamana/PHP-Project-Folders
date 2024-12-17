<section class="py-5 bg-gray">
    <div class="container py-5">
        <h2 class="lined mb-4">Apply to Vacancy</h2> <!-- needs 600x400 image -->
        <div class="row">
            <div class="col-8 pt-3">
                <?php
                if (isset($_GET['msg'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-4 field-required">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="a_fullname" placeholder="" value="" required>
                    </div>
                    <div class="mb-4 field-required">
                        <label for="email">Email</label>
                        <input type="email" value="" class="form-control" name="a_email" id="email" required>
                    </div>
                    <div class="mb-4 field-required">
                        <label for="phone">Phone</label>
                        <input type="number" value="" class="form-control" name="a_phone" id="phone" required>
                    </div>
                    <div class="form-group mb-4 field-required">
                        <label for="file">Upload CV</label><br />
                        <input type="file" name="cv" className="form-control-file" id="file" required />
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Apply</button>
            </div>
        </div>
    </div>
</section>