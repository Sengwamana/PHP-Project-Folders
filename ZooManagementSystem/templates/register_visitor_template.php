<section class="py-5 bg-gray">
    
    <div class="container py-5 ">
        <h2 class="lined mb-4 ">Visitor Registration</h2> <!-- needs 600x400 image -->
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
                    <input type="hidden" name="visitor_id" value="<?= isset($_GET['visitor_id']) ? $_SESSION['visitor_id'] : "" ?>">
                    <div class="row">
                        <div class="col-md-6 mb-4 field-required">
                            <label for="givenname">First name</label>
                            <input type="text" class="form-control" id="givenname" name="v_firstname" placeholder="" value="<?= isset($_GET['visitor_id']) ? $_SESSION['v_firstname']: "" ?>" required>
                        </div>
                        <div class="col-md-6 mb-4 field-required">
                            <label for="speciesname">Last Name</label>
                            <input type="text" class="form-control" id="speciesname" name="v_lastname" placeholder="" value="<?= isset($_GET['visitor_id']) ? $_SESSION['v_lastname']: "" ?>" required>
                        </div>
                    </div>

                    <div class="mb-4 field-required">
                        <label for="dob">Email</label>
                        <input type="email" value="<?= isset($_GET['visitor_id']) ? $_SESSION['v_email']: "" ?>" class="form-control" name="v_email" id="dob" required>
                    </div>

                    <div class="mb-4 field-required">
                        <label for="address">Address</label>
                        <input type="text" value="<?= isset($_GET['visitor_id']) ? $_SESSION['v_address']: "" ?>" class="form-control" name="v_address" id="address" required>
                    </div>
                    <?php if (!isset($_GET['visitor_id'])) {  ?>
                        <div class="mb-4 field-required">
                            <label for="password">Password</label>
                            <input type="password" value="" class="form-control" name="v_password" id="password" required>
                        </div>
                    <?php } ?>

                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"><?= isset($_GET['visitor_id']) ? "Edit" : "Register"  ?> Profile</button>
            </div>
        </div>
    </div>
</section>