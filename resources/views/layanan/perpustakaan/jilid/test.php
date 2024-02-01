<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta description -->
    <meta name="description" content="Psikotes Daring">
    <meta name="author" content="ThemeTags">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!--title-->
    <title>Psikotes Daring</title>

    <!--favicon icon-->
    <link rel="icon" href="<?= base_url() ?>/assets/img/brand/logo.jpg" type="image/png" sizes="16x16">


    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans&display=swap" rel="stylesheet">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/Newhome/css/bootstrap.min.css">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/Newhome/css/magnific-popup.css">
    <!--Themify icon css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/Newhome/css/themify-icons.css">
    <!--animated css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/Newhome/css/animate.min.css">

    <!--Owl carousel css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/Newhome/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/Newhome/css/owl.theme.default.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/Newhome/css/style.css">
    <!--responsive css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/Newhome/css/responsive.css">
    <style>
        .author-img {
            width: 8rem;
            height: 8rem;
            line-height: 8rem;
        }

        /* CSS untuk meratakan teks */
        h5 {
            text-align: justify;
        }
    </style>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>"; // Mendapatkan base URL dari CodeIgniter
    </script>

    <style>
        .funkyradio div {
            clear: both;
            overflow: hidden;
        }

        .funkyradio label {
            width: 100%;
            border-radius: 5px;
            border: 1px solid #D1D3D4;
            font-weight: normal;
        }

        .funkyradio input[type="radio"]:empty,
        .funkyradio input[type="checkbox"]:empty {
            display: none;
        }

        .funkyradio input[type="radio"]:empty~label,
        .funkyradio input[type="checkbox"]:empty~label {
            position: relative;
            line-height: 2.5em;
            text-indent: 3.25em;
            margin-top: 2em;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .funkyradio input[type="radio"]:empty~label:before,
        .funkyradio input[type="checkbox"]:empty~label:before {
            position: absolute;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            content: '';
            width: 2.5em;
            background: #D1D3D4;
            border-radius: 3px 0 0 3px;
        }

        .funkyradio input[type="radio"]:hover:not(:checked)~label,
        .funkyradio input[type="checkbox"]:hover:not(:checked)~label {
            color: #888;
        }

        .funkyradio input[type="radio"]:hover:not(:checked)~label:before,
        .funkyradio input[type="checkbox"]:hover:not(:checked)~label:before {
            content: '\2714';
            text-indent: .9em;
            color: #C2C2C2;
        }

        .funkyradio input[type="radio"]:checked~label,
        .funkyradio input[type="checkbox"]:checked~label {
            color: #777;
        }

        .funkyradio input[type="radio"]:checked~label:before,
        .funkyradio input[type="checkbox"]:checked~label:before {
            content: '\2714';
            text-indent: .9em;
            color: #333;
            background-color: #ccc;
        }

        .funkyradio input[type="radio"]:focus~label:before,
        .funkyradio input[type="checkbox"]:focus~label:before {
            box-shadow: 0 0 0 3px #999;
        }

        .funkyradio-default input[type="radio"]:checked~label:before,
        .funkyradio-default input[type="checkbox"]:checked~label:before {
            color: #333;
            background-color: #ccc;
        }

        .funkyradio-primary input[type="radio"]:checked~label:before,
        .funkyradio-primary input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #337ab7;
        }

        .funkyradio-success input[type="radio"]:checked~label:before,
        .funkyradio-success input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #5cb85c;
        }

        .funkyradio-danger input[type="radio"]:checked~label:before,
        .funkyradio-danger input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #d9534f;
        }

        .funkyradio-warning input[type="radio"]:checked~label:before,
        .funkyradio-warning input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #f0ad4e;
        }

        .funkyradio-info input[type="radio"]:checked~label:before,
        .funkyradio-info input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #5bc0de;
        }
    </style>
</head>

<body>

    <!--header section start-->
    <header class="header">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg fixed-top custom-nav white-bg">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url('home') ?>">
                    <img class="img-fluid" width="400" src="<?= base_url() ?>/assets/img/brand/logohome1.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <div class="collapse navbar-collapse main-menu justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown" style="margin-right: 20px;">
                            <a class="nav-link page-scroll fw-bold text-black" href="<?= base_url('home') ?>"><b>Home</b></a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px;">
                            <a class="nav-link page-scroll fw-bold text-black" href="<?= base_url('home/about') ?>"><b>About</b></a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px;">
                            <a class="nav-link page-scroll fw-bold text-black" href="#team"><b>News</b></a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px;">
                            <a class="nav-link page-scroll fw-bold text-black" href="<?= base_url('pricing') ?>">For Business</a>
                        </li>
                        <li class="nav-item" style="margin-right: 20px;">
                            <a class="nav-link page-scroll fw-bold text-black" href="<?= base_url('home') ?>#contact"><b>Contact</b></a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-end">
                    <a class="btn solid-btn" href="<?= base_url('auth') ?>" value="Login"><b>LOGIN</b></a>
                </div>
            </div>
        </nav>
        <!--end navbar-->
    </header>
    <!--header section end-->

    <div class="main">

        <!--our pricing packages section start-->
        <section id="pricing" class="package-section ptb-100">
            <div class="container">
                <div class="row justify-content-center g-4">
                    <div class="col-lg-4 col-md-6" id="pricingCard1">
                        <div class="card single-pricing-pack p-5">
                            <h5 class="mb-2" data-month="3 Bulan">3 Bulan</h5>
                            <div class="pricing-img mt-3 mb-4">
                                <img src="<?= base_url() ?>/assets/Newhome/img/basic.svg" alt="pricing img" class="img-fluid">
                            </div>
                            <div class="card-body p-0">
                                <div class="form-check mb-3">
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio1" value="4" />
                                            <label for="radio1">4 User</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio2" value="10" />
                                            <label for="radio2">10 User</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio3" value="15" />
                                            <label for="radio3">15 User</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio4" />
                                            <label for="radio4">Custom</label>
                                            <div id="customInput4" style="display: none;" class="mt-3">
                                                <input type="number" class="form-control" id="customAmount" placeholder="Enter custom amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-4 border-0 pricing-header">
                                    <div class="h3 text-center mb-0 color-secondary">Rp<span class="price fw-semibold">75.000</span>/User</div>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="btn outline-btn checkout-btn" data-price="75000" data-card="pricingCard1">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" id="pricingCard2">
                        <div class="card popular-price single-pricing-pack p-5">
                            <h5 class="mb-2" data-month="6 Bulan">6 Bulan</h5>
                            <div class="pricing-img mt-3 mb-4">
                                <img src="<?= base_url() ?>/assets/Newhome/img/standard.svg" alt="pricing img" class="img-fluid">
                            </div>

                            <div class="card-body p-0">
                                <div class="form-check mb-3">
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio5" value="30" />
                                            <label for="radio5">30 User</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio6" value="40" />
                                            <label for="radio6">40 User</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio7" value="50" />
                                            <label for="radio7">50 User</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio8" />
                                            <label for="radio8">Custom</label>
                                            <div id="customInput8" style="display: none;" class="mt-3">
                                                <input type="number" class="form-control" id="customAmount" placeholder="Enter custom amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-4 border-0 pricing-header">
                                    <div class="h3 text-center mb-0 color-secondary">Rp<span class="price fw-semibold">65.000</span>/User</div>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="btn solid-btn checkout-btn" data-price="65000" data-card="pricingCard2">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-6" id="pricingCard3">
                        <div class="card single-pricing-pack p-5">
                            <h5 class="mb-2" data-month="12 Bulan">12 Bulan</h5>
                            <div class="pricing-img mt-3 mb-4">
                                <img src="<?= base_url() ?>/assets/Newhome/img/unlimited.svg" alt="pricing img" class="img-fluid">
                            </div>

                            <div class="card-body p-0">
                                <div class="form-check mb-3">
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio9" value="100" />
                                            <label for="radio9">100 User</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio10" value="150" />
                                            <label for="radio10">150 User</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio11" value="200" />
                                            <label for="radio11">200 User</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio" id="radio12" />
                                            <label for="radio12">Custom</label>
                                            <div id="customInput12" style="display: none;" class="mt-3">
                                                <input type="number" class="form-control" id="customAmount" placeholder="Enter custom amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-4 border-0 pricing-header">
                                    <div class="h3 text-center mb-0 color-secondary">Rp<span class="price fw-semibold">50.000</span>/User</div>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="btn outline-btn checkout-btn" data-price="50000" data-card="pricingCard3">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

        <section id="register" class="contact-us ptb-100 gray-light-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 pb-3 message-box d-none">
                        <div class="alert alert-danger"></div>
                    </div>
                    <div class="col-md-6">
                        <form action="#" method="POST" id="registercompany" class="contact-us-form" novalidate="novalidate">
                            <h5>Register Company</h5>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="logo">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="email_company">Email Company</label>
                                        <input type="email" class="form-control" name="email_company" id="email_company" placeholder="Enter email Company" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="phone_number">Number Phone</label>
                                        <input type="text" name="phone_number" value="" class="form-control" id="phone_number" placeholder="Your Phone">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="pic_name">PIC Name</label>
                                        <input type="text" name="pic_name" value="" class="form-control" id="pic_name" placeholder="PIC Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="pic_email">PIC Email</label>
                                        <input type="text" name="pic_email" value="" class="form-control" id="pic_email" placeholder="PIC Email">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="legality_number">Legality Number</label>
                                        <input type="text" name="legality_number" value="" class="form-control" id="legality_number" placeholder="Legality Number">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="legality_type">Type Legality</label>
                                        <input type="text" name="legality_type" value="" size="40" class="form-control" id="legality_type" placeholder="NPWP/ NIB/ SIUP">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="logo">File Logo</label>
                                        <input type="file" name="logo" value="" class="form-control" id="logo" placeholder="logo">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="legality_file">Legality File</label>
                                        <input type="file" name="legality_file" value="" size="40" class="form-control" id="legality_file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="btn outline-btn">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                    <div class="col-md-6" id="invoice" style="display: flex; align-items: stretch;">
                        <div class="col-lg-12 col-md-12">
                            <div class="card rounded" style="width: 100%;">
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="col-md col-12 p-0 mb-2">
                                            <h4>Pembayaran</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="textmuted p-2">Duration</p>
                                                    <span class="d-block p-2" id="month"></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="textmuted p-2">Price</p>
                                                    <span class="d-block p-2" id="price"></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="textmuted p-2">Items</p>
                                                    <span class="d-block p-2" id="user"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <p>Metode Pembayaran</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="payment-container"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex mb-2" id="fee_selector" style="font-size: small;">
                                                    <span class="">Platform Fee </span>
                                                    <span class="ms-auto" id="text_fee">-</span>
                                                </div>

                                                <div class="d-flex h7 mb-2" style="font-size: small;">
                                                    <p class="">Sub Total</p>
                                                    <p class="ms-auto"><span id="sub_total">-</span></p>
                                                </div>

                                                <div class="d-flex mb-2" id="ppn_selector" style="font-size: small;">
                                                    <span class="">PPN 11% </span>
                                                    <span class="ms-auto" id="text_ppn">-</span>
                                                </div>

                                                <div class="d-flex h7 mb-2" style="font-size: medium;font-weight:bold;">
                                                    <p class="">Total</p>
                                                    <p class="ms-auto"><span class="total_amount">-</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--our pricing packages section end-->
    </div>


    <!--footer section start-->
    <footer class="footer-section" style="text-decoration: black;">

        <!--footer top start-->
        <div class="footer-top pt-100 background-img-2" style="background: url('<?= base_url() ?>/assets/Newhome/img/footer-web-1.png')no-repeat center top / cover">
            <a target="_blank" href="https://api.whatsapp.com/send?phone=6281119931010&text=pesan-intro-anda" class="whatsapp-button"><i class="fab fa-whatsapp"></i></a>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-12 col-lg-4 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                        <div class="footer-nav-wrap text-white">
                            <img class="img-fluid" width="200" height="200" src="<?= base_url() ?>/assets/img/brand/Logo-PutihArtboard-1.png" alt="">
                            <h6><strong>Head Office</strong></h6>
                            <p>Komplek Duta Mas Fatmawati Blok B No. 26
                                Cipete Utara – Kebayoran Baru, Jakarta Selatan, DKI Jakarta, Indonesia - 12150</p>
                            <ul>
                                <li>
                                    <span>
                                        <a href="mailto:contact@psikotesdaring.com"><i class="fas fa-envelope"></i> Email contact@psikotesdaring.com</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a href="https://www.instagram.com/psikotesdaring/"><i class="fab fa-instagram"></i> Instagram psikotesdaring</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a href="https://www.tiktok.com/@psikotesdaring"><i class="fab fa-tiktok"></i> TikTok <a href="https://www.tiktok.com/@psikotesdaring">psikotesdaring</a>
                                    </span>
                                </li>
                                <li class="mt-2">
                                    <a href="https://play.google.com/store/apps/details?id=com.psikotesdaring" target="_blank"><img width="150" src="<?= base_url('assets/homeassets/images/Google_Play_Store_badge_EN.svg.png') ?>" alt="" class="img-fluid"></a>
                                    <a href="https://apps.apple.com/id/app/psikotes-daring/id1585949732?l=id" target="_blank"><img width="150" src="<?= base_url('assets/homeassets/images/Download_on_the_App_Store_logo.png') ?>" alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-4 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                                <!-- <div class="footer-nav-wrap text-white">
                                        <h5 class="mb-3 text-white">Resources</h5>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><a href="#">Help</a></li>
                                            <li class="mb-2"><a href="#">Events</a></li>
                                            <li class="mb-2"><a href="#">Live Support</a></li>
                                            <li class="mb-2"><a href="#">Open Sources</a></li>
                                            <li class="mb-2"><a href="#">Documentation</a></li>
                                        </ul>
                                    </div> -->
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                                <!-- <div class="footer-nav-wrap text-white">
                                        <h5 class="mb-3 text-white">Company</h5>
                                        <ul class="list-unstyled support-list">
                                            <li class="mb-2">
                                                <a href="#">About Us</a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="#">Careers</a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="#">Customers</a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="#">Community</a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="#">Our Team</a>
                                            </li>
                                        </ul>
                                    </div> -->
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <!-- <div class="footer-nav-wrap text-white">
                                        <h5 class="mb-3 text-white">Location</h5>
                                        <ul class="list-unstyled support-list">
                                            <li class="mb-2 d-flex align-items-center text-white"><span class="ti-location-pin me-2"></span>
                                                Komplek Duta Mas Fatmawati Blok B No. 26
                                                Cipete Utara – Kebayoran Baru, Jakarta Selatan, DKI Jakarta, Indonesia - 12150
                                            </li>
                                            <li class="mb-2 d-flex align-items-center text-white"><span class="ti-email me-2"></span>
                                                <a href="contact@psikotesdaring.com">contact@psikotesdaring.com</a>
                                            </li>
                                            <li class="mb-2 d-flex align-items-center text-white"><span class="ti-world me-2"></span>
                                                <a href="#"> www.psikotesdaring.com</a>
                                            </li>
                                        </ul>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer bottom copyright start-->
            <div class="footer-bottom border-gray-light mt-5 py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-7">
                            <div class="copyright-wrap small-text">
                                <p class="mb-0 text-white">Copyright © <?php echo date('Y'); ?> by rumahaplikasi.co.id</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <div class="terms-policy-wrap text-md-end text-start">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a class="small-text" href="#">Terms</a></li>
                                    <li class="list-inline-item"><a class="small-text" href="#">Security</a></li>
                                    <li class="list-inline-item"><a class="small-text" href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer bottom copyright end-->
        </div>
        <!--footer top end-->
    </footer>
    <!--footer section end-->

    <!--jQuery-->
    <script src="<?= base_url() ?>/assets/Newhome/js/jquery-3.6.1.min.js"></script>
    <!--Popper js-->
    <script src="<?= base_url() ?>/assets/Newhome/js/popper.min.js"></script>
    <!--Bootstrap js-->
    <script src="<?= base_url() ?>/assets/Newhome/js/bootstrap.min.js"></script>
    <!--Magnific popup js-->
    <script src="<?= base_url() ?>/assets/Newhome/js/jquery.magnific-popup.min.js"></script>
    <!--jquery easing js-->
    <script src="<?= base_url() ?>/assets/Newhome/js/jquery.easing.min.js"></script>

    <!--wow js-->
    <script src="<?= base_url() ?>/assets/Newhome/js/wow.min.js"></script>
    <!--owl carousel js-->
    <script src="<?= base_url() ?>/assets/Newhome/js/owl.carousel.min.js"></script>
    <!--countdown js-->
    <script src="<?= base_url() ?>/assets/Newhome/js/jquery.countdown.min.js"></script>
    <!--validator js-->
    <script src="<?= base_url() ?>/assets/Newhome/js/validator.min.js"></script>
    <!--custom js-->
    <script src="<?= base_url() ?>/assets/Newhome/js/scripts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".checkout-btn").on("click", function() {
                var selectedValue = $("input[name='radio']:checked", "#" + $(this).data("card")).val();
                var selectedMonth = $("#" + $(this).data("card") + " h5").data("month");

                if (selectedValue === 'custom') {
                    var customAmount = $("#" + $(this).data("card") + " input#customAmount").val();
                    // alert("Anda memilih opsi kustom dengan nilai: " + customAmount + " untuk " + selectedMonth);

                    // Menampilkan invoice
                    var totalCustom = customAmount * 1; // Gantilah 1 dengan harga yang sesuai
                    $("#user").html("<p>Opsi Kustom (" + selectedMonth + "): " + customAmount + "</p><p>Total: Rp" + totalCustom + "</p>");
                } else {
                    var price = $(this).data("price");
                    // alert("Anda memilih opsi dengan nilai: " + selectedValue + " untuk " + selectedMonth + " dan harganya: " + price);

                    var total = selectedValue * price;

                    $("#user").html(selectedValue + "<p>User</p>");
                    $("#price").html(price);
                    $('#month').html(selectedMonth);
                }

                $('html, body').animate({
                    scrollTop: $("#register").offset().top
                }, 1000);
            });

            $("#registercompany").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "https://psikotesdaring.com/TransactionClient/process",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#payment_method').on('change', 'input[type=radio]', function() {
                $('#payment_method input[type=radio]').prop('checked', false);
                $(this).prop('checked', true);

                var method = $(this).val();
                checkFee(method);
            });

            function fetchPrices() {
                $.ajax({
                    url: 'https://psikotesdaring.com/pricing/getPrice',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log('price==>>>>', response.data);
                    },
                    error: function(xhr, status, error) {
                        console.error('errorrrr ==>>>>: ' + error);
                    }
                });
            }

            function fetchPayment() {
                $.ajax({
                    url: 'https://psikotesdaring.com/PaymentMethod/getPaymentMethod',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log('payment==>>>>', response.data);

                        displayPaymentOptions(response.data);
                    },
                    error: function(xhr, status, error) {
                        console.error('errorrrr ==>>>>: ' + error);
                    }
                });
            }

            function formatRupiah(angka) {
                var reverse = angka.toString().split('').reverse().join(''),
                    ribuan = reverse.match(/\d{1,3}/g);
                ribuan = ribuan.join('.').split('').reverse().join('');
                return 'Rp' + ribuan;
            }

            function calculateSubTotal(fee) {
                var selectedValue = $("input[name='radio']:checked").val();
                var price = $(".checkout-btn").data("price");

                if (selectedValue === 'custom') {
                    var customAmount = $("#" + $(".checkout-btn").data("card") + " input#customAmount").val();
                    return (customAmount * 1) + fee; // Gantilah 1 dengan harga yang sesuai
                } else {
                    return (selectedValue * price) + fee;
                }
            }


            function calculatePPN(subTotal) {
                return subTotal * 0.11;
            }

            function displayPaymentOptions(data) {
                var container = $('#payment-container');

                data.forEach(function(item) {
                    var radioBtn = $('<input />', {
                        type: 'radio',
                        name: 'paymentOption',
                        value: item.id,
                        class: 'form-check-input',
                        'data-fee': item.fee
                    });

                    var label = $('<label />', {
                        class: 'form-check-label d-flex align-items-center ml-3'
                    });
                    label.append(radioBtn);

                    var logoImg = $('<img />', {
                        src: item.logo,
                        alt: 'Payment Logo',
                        class: 'img-fluid mr-2',
                        style: 'max-width: 100px; height: auto;'
                    });

                    label.append(logoImg);
                    container.append(label);
                    container.append('<br>');
                });

                container.on('change', 'input[name="paymentOption"]', function() {
                    var selectedFee = $('input[name="paymentOption"]:checked').data('fee');
                    $('#text_fee').text(formatRupiah(selectedFee));

                    var subTotal = calculateSubTotal(selectedFee);
                    $('#sub_total').text(formatRupiah(subTotal));

                    var ppn = calculatePPN(subTotal);
                    $('#text_ppn').text(formatRupiah(ppn));

                    var total = subTotal + ppn;
                    $('.total_amount').text(formatRupiah(total));
                });


            }



            fetchPayment();
            fetchPrices();
        });
    </script>
</body>

</html>