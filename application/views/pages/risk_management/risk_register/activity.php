<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min">
<div class="content-wrapper" style="z-index: -999 !important;">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12 bg-warning py-2">
					<h1 style="color: white;">RISK MANAGEMENT</h1>
				</div>
				<div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
					<ol class="breadcrumb  float-sm-left">
						<li class="breadcrumb-item"><a href="#">RISK MANAGEMENT</a></li>
						<li class="breadcrumb-item text-white">INPUT RISK REGISTER</li>
						<li class="breadcrumb-item text-white">DOKUMEN</li>
						<li class="breadcrumb-item text-white">ACTIVITY</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12" id="form_input_dok">
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">Data Dokumen</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4 col-xs-12">
								<div class="form-group">
									<label for="">No Dokumen</label>
									<input type="text" name="" id="txtNoDocNumber" class="form-control" value="<?= $dok->txtDocNumber ?>" disabled>
								</div>
							</div>
							<div class="col-lg-4 col-xs-12">
								<div class="form-group">
									<label for="">Plant / Departement</label>
									<input type="text" name="" id="txtNamaDepartemen" class="form-control" value="<?= $dok->txtNamaPlant ?>" disabled>
								</div>
							</div>
							<div class="col-lg-4 col-xs-12">
								<div class="form-group">
									<label for="">Section</label>
									<input type="text" name="" id="txtNamaDepartemen" class="form-control" value="<?= $dok->txtNamaDepartement ?>" disabled>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-xs-12">
								<div class="form-group">
									<label for="">Tanggal</label>
									<input type="text" name="" id="dtmInsertedBy" class="form-control" value="<?= date('d-m-Y', strtotime($dok->dtmInsertedBy)) ?>" disabled>
								</div>
							</div>
							<div class="col-lg-4 col-xs-12">
								<div class="form-group">
									<label for="">Create By</label>
									<input type="text" name="" id="txtNamaDepartemen" class="form-control" value="<?= $createBy->nama ?>" disabled>
								</div>
							</div>
							<div class="col-lg-4 col-xs-12">
								<div class="form-group">
									<label for="">Status</label>
									<input type="text" name="" id="txtNamaDepartemen" class="form-control" value="<?= $dok->txtStatus ?>" disabled>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="d-flex justify-content-end">
									<button class="btn btn-success" id="tombol_simpan_dokumen">OK</button>&nbsp;
									<button class="btn btn-success" id="tombol_simpan_dokumen">Validasi</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
			<div class="col-lg-12" id="data_dok">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Data Activity</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12 d-flex justify-content-end">
								<button class="btn btn-info" data-toggle="modal" data-target="#modal-default" id="tombol_add_activity">Add Activity</button>
							</div>
						</div>			
						<div class="row mt-4">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table class="table-bordered table" id="dtList">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Activity</th>
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
	</section>
</div>
<?php $this->load->view('pages/risk_management/risk_register/modal/modal_add_activity'); ?>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
	var url = `<?= base_url() ?>`;
</script>
<script src="<?= base_url('assets/custom_js') ?>/risk_management/activity_risk.js"></script>
