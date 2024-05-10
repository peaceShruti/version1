<?php echo view('header'); ?>

<div id="invoice">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading">e-Invoice</h2>
            </div>
        </div>
        <form action="<?= base_url('/invoice'); ?>" method="post" class="invoice_form" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="owner_name" class="form-label">Name of the Owner or Channel partner <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="owner_name" id="owner_name">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('owner_name') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('email') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="mobile" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="mobile_no" id="mobile" minlength="10" maxlength="10"
                        onkeypress="return validateNumber(event)">
                        <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('mobile_no') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="logo" class="form-label">Add Logo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="logo" id="logo">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('logo') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="date" class="form-label">Date of Bill <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="bill_date" id="date">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('bill_date') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="bill" class="form-label">Bill Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="bill_no" id="bill">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('bill_no') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="bank" class="form-label">Bank or NBFC name to whom the bill is raised <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="bank_name" id="bank">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('bank_name') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="contact_person" class="form-label">Contact person <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="contact_person" id="contact_person">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('contact_person') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="contact_email" class="form-label">Contact person's Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="contact_email" id="contact_email">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('contact_email') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="case_name" class="form-label">CASE Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="case_name" id="case_name">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('case_name') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="loan_amount" class="form-label">Case Details like  Loan amount  ETC <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="loan_amount" id="loan_amount"
                        onkeypress="return validateNumber(event)">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('loan_amount') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="comm_amount" class="form-label">Amount of Commission <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="comm_amount" id="comm_amount"
                        onkeypress="return validateNumber(event)">
                        <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('comm_amount') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="subvention" class="form-label">Subvention if any</label>
                    <input type="text" class="form-control" name="subvention" id="subvention">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="gst" class="form-label">GST <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="gst" id="gst">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('gst') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="gross_total" class="form-label">Gross Total <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="gross_total" id="gross_total"
                        onkeypress="return validateNumber(event)">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('gross_total') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="partner_gst" class="form-label">GST number of Channel Partner <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="partner_gst" id="partner_gst">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('partner_gst') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="partner_pan" class="form-label">PAN number of Channel Partner <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="partner_pan" id="partner_pan">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('partner_pan') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="signature" class="form-label">Add Signature <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="signature" id="signature">
                    <!-- <span class="text-danger"><?= isset($validation) ? $validation->getError('signature') : ''; ?></span> -->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="partner_bank" class="form-label">Bank Details of Channel Partner For payment <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="partner_bank" id="partner_bank" rows="3"></textarea>
                    <span class="text-danger"><?= isset($validation) ? $validation->getError('partner_bank') : ''; ?></span>
                </div>
                <div class="col-md-12 mb-3 text-end">
                    <!-- <button type="submit" class="btn bg_color">Submit</button> -->
                    <a href="<?=base_url('/invoice_view')?>" type="submit" class="btn bg_color">Submit</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php echo view('footer'); ?>