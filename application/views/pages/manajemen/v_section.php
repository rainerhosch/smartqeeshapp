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
									<input type="hidden" name="" id="intIdSection">
									<div class="form-group">
										<label for="">Plant</label>
										<select name="intIdPlant" id="intIdPlant" class="form-control">
											<?php foreach ($plant as $item) { ?>
												<option value="<?= $item['intIdPlant'] ?>"><?= $item['txtNamaPlant'] ?></option>
											<?php } ?>
										</select>
									</div>
									<!-- <div class="form-group">
										<label for="">Departement</label>
										<select name="intIdDepartement" id="intIdDepartement" class="form-control">
											<?php foreach ($departemen as $item) { ?>
												<option value="<?= $item->intIdDepartement ?>"><?= $item->txtNamaDepartement ?></option>
											<?php } ?>
										</select>
									</div> -->
									<div class="form-group">
										<label for="">Nama Function</label>
										<input type="text" name="txtNamaSection" id="txtNamaSection" class="form-control">
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
												<button class="btn btn-warning" onclick="window.location.reload()">Reset</button>
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
                            <h3 class="card-title">Data</h3>                            
                        </div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive">
										<table class="table table-bordered" id="dtList" style="width:100%">
											<thead>
												<tr>
													<th class="text-center">Nama</th>
													<th class="text-center">Nama Plant</th>
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
	</section>
</div>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
	var url = `<?= base_url() ?>`;
</script>
<script src="<?= base_url('assets/custom_js') ?>/master/section.js"></script>
