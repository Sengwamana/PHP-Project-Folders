<?php
$sponAni = $sponsor_animals_pdo->fetchAll();
$classes = [
    ['status' => 'unreviewed'],
    ['status' => 'accepted'],
    ['status' => 'rejected'],
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
            <h1 class="h3 mb-4 text-gray-800">View Animal Sponsorship Applications</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php
                foreach ($classes as $key => $row) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($key == 0) echo "active" ?>" data-toggle="tab" href="#<?php echo $row['status'] ?>" role="tab"><span class="text-capitalize"><?= $row['status'] ?></span></a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content" id="myTabContent">
                <?php
                foreach ($classes as $key => $class) { ?>
                    <div class="tab-pane fade <?php if ($key == 0) echo "show active" ?>" id="<?php echo $class['status'] ?>" role="tabpanel">

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Client/Company Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Yearly Revenue</th>
                                        <th scope="col">Business Type</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Sponsorship Band</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Sponsored Animal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($sponAni as $spon) { ?>
                                        <?php if ($spon['s_status'] == $class['status']) {
                                            $sponsorData = $getSponsor($spon['sponsor_id']);
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><?= $sponsorData['s_client_name'] ?></td>
                                                <td><?= $sponsorData['s_phone_number'] ?></td>
                                                <td><?= $sponsorData['s_yearly_revenue'] ?></td>
                                                <td><?= $sponsorData['s_business_type'] ?></td>
                                                <td><?= $spon['s_url'] ?></td>
                                                <td><?= $spon['sponsor_band'] ?></td>
                                                <td>$<?= $spon['total_price'] ?></td>
                                                <td><?= $spon['start_date'] ?></td>
                                                <td><?= $spon['end_date'] ?></td>
                                                <td><?= $getAnimalName($spon['animal_id']) ?></td>
                                                <?php if ($spon['s_status'] == "unreviewed") { ?>
                                                    <td style="min-width: 200px">
                                                        <a href="archive?sa_id=<?= $spon['sa_id'] ?>&sa_animal_id=<?= $spon['animal_id'] ?>&sa_status=accepted" class="btn btn-success btn-sm d-inline-block"><i class="fas fa-check"></i> Approve</a>
                                                        <a href="archive?sa_id=<?= $spon['sa_id'] ?>&sa_animal_id=<?= $spon['animal_id'] ?>&sa_status=rejected" class="btn btn-danger btn-sm d-inline-block"><i class="fas fa-times"></i> Reject</a>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <i class="text-capitalize"><?= $spon['s_status'] ?></>
                                                    </td>
                                                <?php } ?>
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