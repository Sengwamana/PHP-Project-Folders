<div class="container-fluid">
    <div class="row">
        <div class="col">
            <?php
            if (isset($_GET['msg'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            ?>
            <h1 class="h3 mb-4 text-gray-800">View <?= isset($_GET['reviewed']) ? "Reviewed" : "Unreviewed" ?> Feedback</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($feedback as $key => $feed) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $feed['f_firstname'] ?></td>
                                <td><?= $feed['f_lastname'] ?></td>
                                <td><?= $feed['f_email'] ?></td>
                                <td><?= $feed['f_subject'] ?></td>
                                <td><?= $feed['f_message'] ?></td>
                                <?php if (!isset($_GET['reviewed'])) { ?>
                                    <td>
                                        <a href="archive?rev_feed_id=<?= $feed['feedback_id'] ?>" class="btn btn-primary btn-sm d-inline-block"><i class="fas fa-check"></i> Mark Reviewed</a>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <i>Reviewed</i>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>