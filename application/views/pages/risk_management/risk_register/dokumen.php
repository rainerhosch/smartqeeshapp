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
						<li class="breadcrumb-item text-white">INPUT DOKUMEN</li>
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
						<h3 class="card-title">Form Input Dokumen</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="">No Dokumen</label>
									<?php if ($user != null) { ?>
									<input type="text" name="" id="txtNoDocNumber" class="form-control" value="APF-1.1-RM-<?= $user->txtCodePlant ?>- <?= $user->txtCodeDept ?>.001">
									<?php } else { ?>
									<input type="text" name="" id="txtNoDocNumber" class="form-control" value="">
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="d-flex justify-content-end">
									<button class="btn btn-info" id="tombol_simpan_dokumen">Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12" id="data_dok">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Data Dokumen</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table class="table-bordered table" id="dtList">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Doc No</th>
												<th class="text-center">Create By</th>
												<th class="text-center">Create Date</th>
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
	</section>
</div>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
	var url = `<?= base_url() ?>`;
</script>
<script src="<?= base_url('assets/custom_js') ?>/risk_management/dokumen_risk.js"></script>
