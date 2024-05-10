<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMI</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #content {
            display: none;
            position: relative;
            animation: moveBox 2s ease-in-out infinite alternate;
            transform: rotate(360deg)
        }

        .whatapp_img {
            transform: translate(89px, -8px);
        }

        .email_img {
            transform: translate(53px, -8px);
        }

        #print,
        #share {
            padding: 0.6rem 2rem;
            font-size: 1.3rem;
            margin-left: 1rem;
        }

        .share_logo {
            width: 55px;
            box-shadow: #666;
        }

        .share_logo img {
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>

<body>

    <div id="view_invoice" class="py-5">
        <div class="container-fluid">
            <div class="invoice_form" style="position: relative;">
                <div class="row">
                    <!-- <div class="col-md-12 mb-4">
                        <div class="date_no">
                            <?php $Date = date('d-m-Y', strtotime($data['bill_date'])); ?>
                            <p>Date : <?= $Date ?></p>
                            <p>Bill No : <?= $data['bill_no'] ?></p>
                        </div>
                        <div class="logo">
                            <img src="<?= base_url('public/uploads/' . $data['logo']); ?>" alt="LGOG">
                        </div>
                    </div> -->
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Owner Name : <span><?= $data['owner_name'] ?></span></p>
                                <p>Email : <span><?= $data['email'] ?></span></p>
                                <p>Mobile Number : <span><?= $data['mobile_no'] ?></span></p>
                            </div>
                            <div class="text-end">
                                <p>Contact Person : <span><?= $data['contact_person'] ?></span></p>
                                <p>Email : <span><?= $data['contact_email'] ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row px-3 py-4">
                    <table class="table  table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th style="width: 10%">Sr.</th>
                                <th style="width: 40%">Details</th>
                                <th style="width: 50%">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Case Name</td>
                                <td><?= $data['case_name'] ?></td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Bank Name</td>
                                <td><?= $data['bank_name'] ?></td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Subvention</td>
                                <td><?= $data['subvention'] ?></td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>GST</td>
                                <td><?= $data['gst'] ?></td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td>GST number of Channel Partner</td>
                                <td><?= $data['partner_gst'] ?></td>
                            </tr>
                            <tr>
                                <td>06</td>
                                <td>Pan number of Channel Partner</td>
                                <td><?= $data['partner_pan'] ?></td>
                            </tr>
                            <tr>
                                <td>07</td>
                                <td>Bank Details of Channel Partner For payment</td>
                                <td><?= $data['partner_bank'] ?></td>
                            </tr>
                            <tr>
                                <td>08</td>
                                <td>Loan Amount</td>
                                <td><?= $data['loan_amount'] ?></td>
                            </tr>
                            <tr>
                                <td>09</td>
                                <td>Amount of Commission</td>
                                <td><?= $data['comm_amount'] ?></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Gross Total</td>
                                <td><?= $data['gross_total'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row ">
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="signature_img">
                            <img src="<?= base_url('public/uploads/' . $data['signature']); ?>" alt="Signature">
                            <p class="text-center">Signature</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-5">
                <div class="col-md-12 text-center">
                    <button class="btn bg_color btn-lg" id="print">Print</button>
                    <button type="submit" class="btn bg_color" id="share">Share</button>
                    <div class="col-md-12 text-center mt-2 toggle" id="content">
                        <img src="<?= base_url('assets/images/wp.png') ?>" alt="whatapp image"
                            class="whatapp_img m-4 share_logo" onclick="redirectToWhatsApp()">
                        <img src="<?= base_url('assets/images/mail.png') ?>" alt="email image"
                            class="email_img m-4 share_logo" onclick="redirectToMail()">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>

    <script>
        $(document).ready(function () {
            $('#print').click(function () {
                window.print();
            });
        });
        document.getElementById("share").addEventListener("click", function () {
            let content = document.getElementById("content");
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
        // redirecting to wp
        function redirectToWhatsApp() {
            // Define the WhatsApp phone number and message
            var phoneNumber = "1234567890"; // Replace with the phone number you want to message
            var message = "Hello!"; // Replace with the message you want to send

            // Construct the WhatsApp API link
            var whatsappLink = "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(message);

            // Redirect the user to WhatsApp
            window.location.href = whatsappLink;
        }

        // redireting to email
        function redirectToMail() {
            // Define the recipient email address, subject, and body
            var emailAddress = "recipient@example.com"; // Replace with the recipient's email address
            var subject = "Subject"; // Replace with the email subject
            var body = "Message body"; // Replace with the email body

            // Construct the mailto link
            var mailtoLink = "mailto:" + encodeURIComponent(emailAddress) + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);

            // Redirect the user to the default email client
            window.location.href = mailtoLink;
        }
    </script>

</body>

</html>