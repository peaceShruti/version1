<?php echo view('header'); ?>

<div id="about">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 mb-3">
                <h2 class="heading">About Us</h2>
                <div class="desc-text">
                    We don’t save any of the data used or shared on this website.
                    This website is made for educational purposes only and should not understood to be any offer for
                    doing transactions with us. All Final decisions on documents, eligibility, and EMI calculations are
                    at the sole discretion of the respective banks or financial institutions only.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="img_sec">
                    <img src="<?= base_url('assets/images/about.png') ?>" alt="About image" class="about_img">
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('footer'); ?>