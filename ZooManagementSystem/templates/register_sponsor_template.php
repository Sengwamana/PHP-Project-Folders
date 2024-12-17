<section class="py-5 bg-gray">
    <div class="container py-5">
        <h2 class="lined mb-4">Sponsor Registration</h2> <!-- needs 600x400 image -->
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
                <form action="" method="POST">
                    <input type="hidden" name="sponsor_id" value="<?= isset($_GET['sponsor_id']) ? $_SESSION['sponsor_id'] : "" ?>">
                    <div class="mb-4 field-required">
                        <label for="givenname">Client/Company Name</label>
                        <input type="text" class="form-control" id="givenname" name="s_client_name" placeholder="" value="<?= isset($_GET['sponsor_id']) ? $_SESSION['s_client_name'] : "" ?>" required>
                    </div>
                    <div class="mb-4 field-required">
                        <label for="select_animal">Existing Customer</label>
                        <select class="custom-select d-block w-100" name="s_existing_customer" id="select_animal" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="mb-4 field-required">
                        <label for="s_phone_number">Phone</label>
                        <input type="number" value="<?= isset($_GET['sponsor_id']) ? $_SESSION['s_phone_number'] : "" ?>" class="form-control" name="s_phone_number" id="s_phone_number" required>
                    </div>
                    <div class="mb-4 field-required">
                        <label for="s_client_address">Client/Company Address</label>
                        <textarea name="s_client_address" placeholder="...." class="form-control" id="s_client_address" cols="30" rows="5" required><?= isset($_GET['sponsor_id']) ? $_SESSION['s_client_address'] : "" ?></textarea>

                    </div>
                    <div class="mb-4 field-required">
                        <label for="s_business_type">Business Type</label>
                        <input type="text" value="<?= isset($_GET['sponsor_id']) ? $_SESSION['s_business_type'] : "" ?>" class="form-control" name="s_business_type" id="s_business_type" required>
                    </div>
                    <div class="mb-4 field-required">
                        <label for="s_yearly_revenue">Yearly Revenue/Income</label>
                        <input type="number" value="<?= isset($_GET['sponsor_id']) ? $_SESSION['s_yearly_revenue'] : "" ?>" class="form-control" name="s_yearly_revenue" id="s_yearly_revenue" required>
                    </div>
                    <div class="mb-4 field-required">
                        <label for="s_email">Email</label>
                        <input type="email" value="<?= isset($_GET['sponsor_id']) ? $_SESSION['s_email'] : "" ?>" class="form-control" name="s_email" id="s_email" required>
                    </div>

                    <?php if (!isset($_GET['sponsor_id'])) {  ?>
                        <div class="mb-4 field-required">
                            <label for="s_password">Password</label>
                            <input type="password" value="" class="form-control" name="s_password" id="s_password" required>
                        </div>
                    <?php } ?>

                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"><?= isset($_GET['sponsor_id']) ? "Update Details" : "Apply for Sponsorship"  ?></button>
            </div>
        </div>
    </div>
</section>