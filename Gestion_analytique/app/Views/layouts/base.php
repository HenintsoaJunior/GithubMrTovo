<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>gestion_analytique</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/fonts/fontawesome-all.min.css') ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/css/template.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/table.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/formulaire.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/pagination.css') ?>" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.5.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url('index.html') ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
                <span class="d-none d-lg-block"></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-heading">dashboard sur le gestion_analytique</li>

            <!-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#amortissements-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Amortissements</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="amortissements-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('/amortissements-list') ?>">
                            <i class="bi bi-circle"></i><span>Amortissements</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('amortissement-form') ?>">
                            <i class="bi bi-circle"></i><span>Ajout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#centres-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Centres</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="centres-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('/centres-list') ?>">
                            <i class="bi bi-circle"></i><span>Centres</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('centre-form') ?>">
                            <i class="bi bi-circle"></i><span>Ajout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charges-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Charges</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charges-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('/charges-list') ?>">
                            <i class="bi bi-circle"></i><span>Charges</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('charge-form') ?>">
                            <i class="bi bi-circle"></i><span>Ajout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#groupes-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Groupes</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="groupes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('/groupes-list') ?>">
                            <i class="bi bi-circle"></i><span>Groupes</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('groupe-form') ?>">
                            <i class="bi bi-circle"></i><span>Ajout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#liaison_charge_centre-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Liaison_charge_centre</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="liaison_charge_centre-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('/liaison_charge_centre-list') ?>">
                            <i class="bi bi-circle"></i><span>Liaison_charge_centre</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('liaison_charge_centre-form') ?>">
                            <i class="bi bi-circle"></i><span>Ajout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nature_charges-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Nature_charges</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nature_charges-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('/nature_charges-list') ?>">
                            <i class="bi bi-circle"></i><span>Nature_charges</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('nature_charge-form') ?>">
                            <i class="bi bi-circle"></i><span>Ajout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#type_charges-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Type_charges</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="type_charges-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('/type_charges-list') ?>">
                            <i class="bi bi-circle"></i><span>Type_charges</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('type_charge-form') ?>">
                            <i class="bi bi-circle"></i><span>Ajout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#unites-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Unites</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="unites-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?= site_url('/unites-list') ?>">
                            <i class="bi bi-circle"></i><span>Unites</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('unite-form') ?>">
                            <i class="bi bi-circle"></i><span>Ajout</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('formulaire_analytique'); ?>" style="background-color: whitesmoke;color:black">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>FORMULAIRE ANALYTIQUE</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('global'); ?>" style="background-color: whitesmoke;color:black">
                    <i class="bi bi-table"></i>
                    <span>TABLEAU ANALYTIQUE</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('total_montant_analytique'); ?>" style="background-color: whitesmoke; color:black">
                    <i class="bi bi-coin"></i>
                    <span>ARGENT ANALYTIQUE</span>
                </a>
            </li>

            
            

            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('cout_elevage_list'); ?>" style="background-color: whitesmoke;color:black">
                    <i class="bi bi-cash"></i>
                    <span>COUT ELEVAGE</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('cout_production_general_list'); ?>" style="background-color: whitesmoke;color:black">
                    <i class="bi bi-cash"></i>
                    <span>COUT PRODUCTION</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar -->
    </aside><!-- End Sidebar -->
    <?= $this->renderSection('content') ?>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>ETU-2802</span><span>, ETU-2587</span><span>, ETU-2528</span><span>, ETU-2751</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/chart.js/chart.umd.js') ?>"></script>
<script src="<?= base_url('assets/vendor/echarts/echarts.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/quill/quill.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
<script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js') ?>"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/js/main1.js') ?>"></script>

</body>
</html>
