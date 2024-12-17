<section class="py-5 bg-cover bg-gray">
    <div class="container py-5">
        <h1 class="lined">Contact</h1>
        <p class="lead my-4">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6 mb-4">
                        <div class="icon mb-4"><i class="pe-7s-map-2"></i></div>
                        <h5 class="lined mb-4">Address</h5>
                        <p class="text-muted mb-0 text-small">13/25 The Canyon Zoo</p>
                        <p class="text-muted mb-0 text-small">3485 Sardis Sta</p>
                        <p class="text-muted mb-0 text-small">Dallas, <strong>TX </strong></p>
                    </div>
                    <div class="col-lg-12 col-md-6 mb-4">
                        <div class="icon mb-4"><i class="pe-7s-phone"></i></div>
                        <h5 class="lined mb-4">Call center</h5>
                        <p class="text-muted mb-3 text-small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum iure reiciendis sapiente.</p>
                        <p class="text-muted font-weight-bold">+11 222 333 44</p>
                    </div>
                    <div class="col-lg-12 col-md-6 mb-4">
                        <div class="icon mb-4"><i class="pe-7s-mail-open"></i></div>
                        <h5 class="lined mb-4">Electronic support</h5>
                        <p class="text-muted mb-3 text-small">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                        <ul>
                            <li><a href="#" class="font-weight-bold text-small">info@codeastro.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 ml-auto">
                <div class="col-lg-12 col-md-6 mb-4">
                    <div class="icon mb-4"><i class="pe-7s-pen"></i></div>
                    <?php
                    if (isset($_GET['msg'])) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                         </div>';
                    } ?>
                    <h5 class="lined mb-4">Contact form</h5>
                    <p class="text-muted text-small">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.</p>
                    <form id="contact-form" method="post" action="" class="contact-form form">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="name" class="font-weight-normal">Firstname</label>
                                <input id="name" type="text" name="f_firstname" class="form-control" value="<?= isset($_SESSION['v_firstname']) ? $_SESSION['v_firstname']  : "" ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="surname" class="font-weight-normal">Lastname </label>
                                <input id="surname" type="text" name="f_lastname" class="form-control" value="<?= isset($_SESSION['v_lastname']) ? $_SESSION['v_lastname']  : "" ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email" class="font-weight-normal">Email</label>
                                <input id="email" type="email" name="f_email" class="form-control" value="<?= isset($_SESSION['v_email']) ? $_SESSION['v_email']  : "" ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="subject" class="font-weight-normal">Subject</label>
                                <input id="subject" type="text" name="f_subject" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="message" class="font-weight-normal">Message</label>
                                <textarea id="message" rows="4" name="f_message" class="form-control" required></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <?php if (isset($_SESSION['authenticated'])) { ?>
                                    <button type="submit" class="btn btn-outline-primary" name="submit"> <i class="far fa-envelope mr-2"> </i>Send message</button>
                                <?php } else { ?>
                                    <button class="btn btn-outline-danger" disabled>You have to be logged in to send messages</button>
                                <?php } ?>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d429173.54259711574!2d-97.01174958554714!3d32.82092960729182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c19f77b45974b%3A0xb9ec9ba4f647678f!2sDallas%2C%20TX%2C%20USA!5e0!3m2!1sen!2snp!4v1645276193375!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
<!-- <script src="vendor/lightbox2/js/lightbox.min.js"></script> -->
<!-- <script src="vendor/leaflet/leaflet.js"></script> -->
<!-- <script src="js/front.js"></script> -->