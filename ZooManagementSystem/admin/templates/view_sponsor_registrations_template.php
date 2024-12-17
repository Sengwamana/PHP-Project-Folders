<?php
$sponsors = $sponsors_pdo->fetchAll();
$classes = [
    ['approved' => 'false'],
    ['approved' => 'true'],
    ['approved' => 'rejected'],
]
?>
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
            <h1 class="h3 mb-4 text-gray-800">View Sponsor Registrations</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php
                foreach ($classes as $key => $row) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($key == 0) echo "active" ?>" data-toggle="tab" href="#<?php echo $row['approved'] ?>" role="tab"><span class="text-capitalize"><?= $row['approved'] == 'true' ? "approved" : ($row['approved'] == "false" ? "unreviewed" : "rejected") ?></span></a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content" id="myTabContent">
                <?php
                foreach ($classes as $key => $class) { ?>
                    <div class="tab-pane fade <?php if ($key == 0) echo "show active" ?>" id="<?php echo $class['approved'] ?>" role="tabpanel">

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Client/Company Name</th>
                                        <th scope="col">Existing Customer</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Client/Company Address</th>
                                        <th scope="col">Yearly Revenue</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Business Type</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($sponsors as $spon) { ?>
                                        <?php if ($spon['s_approved'] == $class['approved']) { ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><?= $spon['s_client_name'] ?></td>
                                                <td><?= $spon['s_existing_customer'] ?></td>
                                                <td><?= $spon['s_phone_number'] ?></td>
                                                <td><?= $spon['s_client_address'] ?></td>
                                                <td><?= $spon['s_yearly_revenue'] ?></td>
                                                <td><?= $spon['s_email'] ?></td>
                                                <td><?= $spon['s_business_type'] ?></td>
                                                <?php if ($spon['s_approved'] == "false") { ?>
                                                    <td style="min-width: 200px">
                                                        <a href="archive?spon_app_id=<?= $spon['sponsor_id'] ?>&type=true" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-check"></i> Approve</a>
                                                        <a href="archive?spon_app_id=<?= $spon['sponsor_id'] ?>&type=rejected" class="btn btn-danger btn-sm d-inline-block"><i class="fas fa-times"></i> Reject</a>
                                                    </td>
                                                <?php } else if ($spon['s_approved'] == "true") { ?>
                                                    <td>
                                                        <i>Accepted</i>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <i>Rejected</i>
                                                    </td>
                                                <?php }  ?>

                                            </tr>
                                        <?php } ?>
                                    <?php   } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>