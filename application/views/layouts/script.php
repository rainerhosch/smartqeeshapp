<!-- jQuery -->
<script src="<?= base_url('assets/templates') ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/js/adminlte.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/js/myscript.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/templates') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<?php if ($page != 'Auth') : ?>
    <script src="<?= base_url('assets/templates') ?>/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/sparklines/sparkline.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/templates') ?>/plugins/daterangepicker/daterangepicker.js"></script>
<?php endif; ?>
<script src="<?= base_url("assets/custom_js/clsGlobal.js") ?>"></script>
<script>
    var clsGlobal = new clsGlobalClass();
</script>