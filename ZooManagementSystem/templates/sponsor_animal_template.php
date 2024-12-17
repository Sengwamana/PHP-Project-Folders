<section class="py-5 bg-gray">
    <div class="container py-5">
        <h2 class="lined mb-4">Animal Sponsorship Form</h2>
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
                        <label for="total_price">Total Price</label>
                        <input type="number" class="form-control" id="total_price" name="total_price" placeholder="" min="500" required>
                    </div>

                    <div class="mb-4 field-required">
                        <label for="start_date">Contract Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="start_date" required>
                    </div>
                    <div class="mb-4 field-required">
                        <label for="end_date">Contract End Date</label>
                        <input type="date" class="form-control" name="end_date" id="end_date" required>
                    </div>
                    <div class="mb-4 field-required">
                        <label for="s_url">URL of your business</label>
                        <input type="text" class="form-control" name="s_url" id="s_url" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="file">Image to be displayed on signage</label><br />
                        <input type="file" name="image" className="form-control-file" id="file" accept="image/*" required/>
                    </div>


                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"> Apply for Sponsorship</button>
            </div>
        </div>
    </div>
</section>