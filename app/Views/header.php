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

</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/'); ?>">
                <img src="<?= base_url('assets/images/logo.png'); ?>" alt="LOGO" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <?php $uri = service('uri'); ?>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item<?= $uri->getSegment(1) === '' ? ' active' : ''; ?>">
                        <a class="nav-link " aria-current="page" href="<?= base_url('/'); ?>">Home</a>
                    </li>
                    <li class="nav-item<?= $uri->getSegment(1) === 'about' ? ' active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('about'); ?>">About Us</a>
                    </li>
                    <li class="nav-item<?= $uri->getSegment(1) === 'enquire' ? ' active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('enquire'); ?>">Enquire Now</a>
                    </li>
                    <li class="nav-item<?= $uri->getSegment(1) === 'contact' ? ' active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('contact'); ?>">Contact Us</a>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>