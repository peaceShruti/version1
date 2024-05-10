<?php echo view('header'); ?>

<div id="contact">
    <div class="container">
        <h2 class="heading mb-5">Get in touch with us</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="">
                        <img src="<?= base_url('assets/images/email.png'); ?>" alt="Email" class="card_img">
                        <h4 class="card_heading text-center">
                            Email
                        </h4>
                        <div class="card_text text-center">
                            <a href="mailto:testinfo@gmail.com">testinfo@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="">
                        <img src="<?= base_url('assets/images/gps.png'); ?>" alt="Address" class="card_img">
                        <h4 class="card_heading text-center">
                            Address
                        </h4>
                        <div class="card_text text-center">
                            First Floor, C-125 1st Floor, Eastern Business District, L.B.S. Marg, Bhandup West, Mumbai,
                            Maharashtra 400078.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="">
                        <img src="<?= base_url('assets/images/phone.png'); ?>" alt="Phone" class="card_img">
                        <h4 class="card_heading text-center">
                            Phone
                        </h4>
                        <div class="card_text text-center">
                            <a href="tel:+919876543210">+91 9876543210</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('footer'); ?>