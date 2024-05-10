<?php echo view('header'); ?>

<div id="enquire">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <h2 class="heading">Enquire Now</h2>
                <form action="" class="enquire_form" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn bg_color">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mb-3">
            <div class="img_sec">
                    <img src="<?= base_url('assets/images/enquire.png') ?>" alt="About image" class="about_img">
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('footer'); ?>