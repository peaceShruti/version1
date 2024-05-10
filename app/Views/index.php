<?= view('header') ?>

<div class="" id="home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 d-flex justify-content-center my-4">
                <a href="<?= base_url('emi-calculator'); ?>">
                    <div class="card p-3" style="width: 18rem;">
                        <div class="card-body d-flex align-items-center">
                            <img class="card_image" src="<?= base_url('assets/images/budget.png') ?>" alt="">
                            <h5 class="card-title">EMI Calculator</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center my-4">
                <a href="<?= base_url('documents-checklist'); ?>">
                    <div class="card p-3" style="width: 18rem;">
                        <div class="card-body d-flex align-items-center">
                            <img class="card_image" src="<?= base_url('assets/images/checklist.png') ?>" alt="">
                            <h5 class="card-title">Documents Checklist</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center my-4">
                <a href="<?= base_url('eligibility-calculator'); ?>">
                    <div class="card p-3" style="width: 18rem;">
                        <div class="card-body d-flex align-items-center">
                            <img class="card_image" src="<?= base_url('assets/images/criteria.png') ?>" alt="">
                            <h5 class="card-title">Eligibility Calculator</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center my-4">
                <a href="<?= base_url('bank-products'); ?>">
                    <div class="card p-3" style="width: 18rem;">
                        <div class="card-body d-flex align-items-center">
                            <img class="card_image" src="<?= base_url('assets/images/product.png') ?>" alt="">
                            <h5 class="card-title">Bank Products</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center my-4">
                <a href="<?= base_url('invoice'); ?>">
                    <div class="card p-3" style="width: 18rem;">
                        <div class="card-body d-flex align-items-center">
                            <img class="card_image" src="<?= base_url('assets/images/invoice.png') ?>" alt="">
                            <h5 class="card-title">e-Invoice</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?= view('footer') ?>