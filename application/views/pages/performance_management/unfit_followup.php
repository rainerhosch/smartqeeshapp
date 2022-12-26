<style type="text/css">
    .select2 {
    width:100%!important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
<div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
<div class="content-wrapper" style="z-index: -999 !important;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 bg-warning py-2">
                    <h1 style="color: white;">PERFORMANCE MANAGEMENT</h1>
                </div>
                <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
                    <ol class="breadcrumb  float-sm-left">
                        <li class="breadcrumb-item"><a href="<?=base_url('performance_management/dashboard')?>">PERFORMANCE MANAGEMENT</a></li>
                        <li class="breadcrumb-item text-white">MEDICAL CHECKUP</li>
                        <li class="breadcrumb-item text-white">UNFIT FOLLOWUP</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <!--TAB-->
            <ul class="nav nav-tabs bg-secondary " id="custom-content-above-tab" role="tablist" style="margin-bottom: -1px;">
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup')?>">INPUT DATA PERSONAL MCU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_record')?>">PERSONAL MCU RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_perf')?>">MCU PERFORMANCE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/unfit_followup')?>">UNFIT FOLLOWUP</a>
                </li>
            </ul>
            <!--/.TAB-->

            <!--TAB CONTENT-->
            <div class="tab-content">
                <div>
                    <div class="card-body text-xl text-center m-4"><b>INTERFACE BELUM TERSEDIA</b></div>
                <!--PERSONAL MCU RECORD-->
                
                </div>
                <!--/.PERSONAL MCU RECORD-->
            </div>
        </div>
    </section>
</div>

<!-- Page specific script -->

<script src="<?= base_url('assets/templates') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/pdfmake/vfs_fonts.js"></script>

<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/jszip/jszip.min.js"></script>

<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>