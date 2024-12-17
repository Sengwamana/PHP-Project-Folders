<?php
$galleries = $galleries_pdo->fetchAll();
$classes = [
    ['type' => 'image'],
    ['type' => 'video']
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
            <h1 class="h3 mb-4 text-gray-800">Update Gallery Contents</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php
                foreach ($classes as $key => $row) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($key == 0) echo "active" ?>" data-toggle="tab" href="#<?php echo $row['type'] ?>" role="tab"><span class="text-capitalize"><?= $row['type']; ?></span></a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content" id="myTabContent">
                <?php
                foreach ($classes as $key => $class) { ?>
                    <div class="tab-pane fade <?php if ($key == 0) echo "show active" ?>" id="<?php echo $class['type'] ?>" role="tabpanel">

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?= $class['type'] == "image" ? "Image" : "Video Filename" ?></th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($galleries as $gal) { ?>
                                        <?php if ($gal['g_file_type'] == $class['type']) { ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <?php if ($class['type'] == "image") { ?>
                                                    <td><img src="../../img/gallery/image/<?= $gal['g_file_name'] ?>" alt="" width="120px" style="border-radius: 20px;"></td>
                                                <?php } else { ?>
                                                    <td><?= $gal['g_file_name'] ?></td>
                                                <?php } ?>
                                                <td>
                                                    <a href="archive?gallery_id=<?= $gal['g_id'] ?>" class="btn btn-warning btn-sm d-inline-block"><i class="fas fa-archive"></i> Archive</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php   } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                <?php } ?>
            </div>

            <div class="mt-5">
                <h4 class="mb-4">Upload Image for Gallery</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-4">

                        <input type="file" name="image" className="form-control-file" accept="image/*" required />
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit_image">Add Image</button>
                </form>
            </div>
            <div class="mt-5">
                <h4 class="mb-4">Upload Video for Gallery</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-4">

                        <input type="file" name="video" className="form-control-file" accept="video/*" required />
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit_video">Add Video</button>
                </form>
            </div>
        </div>
    </div>
</div>