<section class="py-5 bg-gray">
    <div class="container py-5">
        <h2 class="lined mb-4">Book Tickets</h2> <!-- needs 600x400 image -->
        <div class="row">
            <div class="col-8">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Ticket Group</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Regular</td>
                            <td>$6.00</td>
                        </tr>
                        <tr>
                            <td>Student</td>
                            <td>$3.00</td>
                        </tr>
                        <tr>
                            <td>Child</td>
                            <td>$2.00</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-5">
                    <h5>Select Number of Tickets</h5>
                    <?php
                    if (isset($_GET['msg'])) {
                        echo '<div class="alert alert-' . $_GET['type'] . ' alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                         </div>';
                    } ?>
                    <form method="POST">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="book_name" placeholder="Name of person who books the tickets" value="<?= (isset($_SESSION['v_firstname']) && isset($_SESSION['v_lastname'])) ? $_SESSION['v_firstname'] . ' ' . $_SESSION['v_lastname'] : "" ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="regular" class="col-sm-2 col-form-label">Regular:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="regular" value="0" name="regular_num">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student" class="col-sm-2 col-form-label">Student:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="student" value="0" name="student_num">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="child" class="col-sm-2 col-form-label">Child:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="child" value="0" name="child_num">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date:</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="date" value="0" name="t_date" required>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-sm-10">
                                <?php if (isset($_SESSION['authenticated'])) { ?>
                                    <button type="submit" class="btn btn-primary" name="submit">Book Ticket</button>
                                <?php } else { ?>
                                    <button class="btn btn-danger" disabled>You have to be logged in to book tickets</button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- start of paypal -->

                        <!-- end of paypal -->
                    </form>

                </div>

            </div>
        </div>
    </div>
</section>