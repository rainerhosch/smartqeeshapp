<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $page; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $page; ?></a></li>
                        <li class="breadcrumb-item active"><?= $subpage; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Form Input</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="" id="intIdTahapanProses">
                                    <div class="form-group">
                                        <label for="">Function</label>
                                        <select name="intIdSection" id="intIdSection" class="form-control">
                                            <option value="">Pilih Section</option>
                                            <?php foreach ($section as $item) { ?>
                                            <option value="<?= $item['intIdSection'] ?>"><?= $item['txtNamaSection'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Departement</label>
                                        <select name="intIdDepartement" id="intIdDepartement" class="form-control">
                                            <option value="">Pilih Departement</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Activity</label>
                                        <select name="intIdActivity" id="intIdActivity" class="form-control">
                                            <option value="">Pilih Activity</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Sub Activity</label>
                                        <input type="text" name="txtNamaTahapan" id="txtNamaTahapan"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Aktif</label>
                                        <select name="bitcative" id="bitActive" class="form-control">
                                            <option value="1">Aktif</option>
                                            <option value="0">Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-end">
                                        <div class="row">
                                            <div class="col-xs-12 div col-lg-6">
                                                <button class="btn btn-warning"
                                                    onclick="window.location.reload()">Reset</button>
                                            </div>
                                            <div class="col-xs-12 div col-lg-6">
                                                <button class="btn btn-info" id="tombol_simpan">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-green">
                            <h3 class="card-title">Data Tahapan Proses</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card bg-white">
                                        <div class="card-header bg-blue">
                                            <h4 class="card-title">Filter Option</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="intIdSection_filter">Filter Function</label>
                                                        <select name="" id="intIdSection_filter" class="form-control">
                                                            <option value="">Pilih Function</option>
                                                            <?php foreach ($section as $item) : ?>
                                                            <option value="<?= $item['intIdSection']; ?>">
                                                                <?= $item['txtNamaSection']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="intIdDepartement_filter">Filter Departement</label>
                                                        <select name="" id="intIdDepartement_filter"
                                                            class="form-control"></select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="intIdActivity_filter">Filter Activity</label>
                                                        <select name="" id="intIdActivity_filter"
                                                            class="form-control"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card bg-white">
                                        <div class="card-header">
                                            <h4 class="card-title">List Data</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-sm" id="dtList">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Function</th>
                                                        <th class="text-center">Departement</th>
                                                        <th class="text-center">Activity</th>
                                                        <th class="text-center">Sub Activity</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Option</th>
                                                    </tr>
                                                </thead>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script>
var url = `<?= base_url() ?>`;
</script>
<script src="<?= base_url('assets/custom_js') ?>/master/tahapan_proses.js"></script>
