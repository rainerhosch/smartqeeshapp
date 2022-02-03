<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/templates/img/favicon/smart_qeesh.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/adminlte.min.css">
    <?php if ($page != 'Auth') : ?>
        <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
        <!-- <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/summernote/summernote-bs4.min.css"> -->
    <?php endif; ?>
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/main-bg-photo.css">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/css/main.css"> -->
    <style>
        .user-panel .exit {
            display: inline-block;
            padding: 5px 5px 5px 40px;
        }

        .layout-navbar-fixed .wrapper .bg-new-dark .brand-link:not([class*=navbar]) {
            background-color: #cd7e00;
        }

        .sidebar a {
            color: #ffffff;
        }

        .bg-new-soft {
            background-color: #bf8c3c;
        }

        .nav-pills .nav-link {
            color: #ffffff;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #423a3a;
            background-color: #ffd966;
        }
    </style>
</head>
<?php if ($page != 'Auth') : ?>

    <body class="hold-transition layout-navbar-fixed layout-footer-fixed" style="height: auto;">
        <div class="wrapper">

            <?php $this->load->view('layouts/script'); ?>
            <?php $this->load->view('layouts/navbar'); ?>
            <?php $this->load->view('layouts/sidebar'); ?>
            <?php $this->load->view($content); ?>
            <?php $this->load->view('layouts/footer'); ?>
        </div>
    </body>
<?php else : ?>
    <?php $this->load->view('layouts/script'); ?>
    <?php $this->load->view($content); ?>
<?php endif; ?>

</html>