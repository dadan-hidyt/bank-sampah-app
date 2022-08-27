<?php
/**
 * cek dyky 
 * */
if(core()->auth->isLogin() === false) {
    session()->flashWarning('login_gagal_message', 'Login dulu untuk mengakses halaman ini!');
    redirect('../login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('part/_head')
    <script src='@{ echo base_url("assets/js/sweet-alert.min.js"); }'></script>
    <script src="<?= base_url()."assets/js/jquery.js" ?>"></script>
    <script src="<?= base_url('assets/vendors/datatable/datatables.js') ?>"></script>
    <title>@{echo get_title($title,true)}</title>
</head>

<body <?= set_body_class('header-fixed'); ?>>
    @include('part/_nav')
    <div class="page-body">
        @include('part/_sidebar')
        <div class="page-content-wrapper">
            <div class="page-content-wrapper-inner">
                <div class="content-viewport">
                    %@content%
                </div>
            </div>
            <!-- s:footer -->
            <footer class="footer">
                <div class="row">
                    <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                        <small class="text-muted d-block">Copyright © @{echo date('Y')}
                            <i class="mdi mdi-xml mdi-1x"></i> <i class="mdi mdi-heart text-danger"></i>
                            <a href="http://www.uxcandy.co" target="_blank">SAMPAHKITA</a>. All rights reserved</small>
                        </div>
                    </div>
                </footer>
                <!-- e:footer -->
            </div>
        </div>
        <!-- plugins:js -->
        <script src="<?= base_url(); ?>assets/vendors/js/core.js"></script>
        <!-- endinject -->
        <!-- Vendor Js For This Page Ends-->
        <script src="<?= base_url(); ?>assets/vendors/apexcharts/apexcharts.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendors/chartjs/Chart.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/charts/chartjs.addon.js"></script>
        <!-- Vendor Js For This Page Ends-->
        <!-- build:js -->
        <script src="<?= base_url(); ?>assets/js/template.js"></script>
        <script src="<?= base_url(); ?>assets/js/dashboard.js"></script>
        <!-- endbuild -->

    </body>

    </html>