<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/summernote/summernote-bs4.min.css">
<input type="hidden" name="intIdDokRiskRegister" id="intIdDokRiskRegister" value="<?= $intIdDokRegister ?>">
<input type="hidden" name="intIdActivityRisk" id="intIdActivityRisk">
<input type="hidden" name="intIdTahapanProsesRisk" id="intIdTahapanProsesRisk">
<input type="hidden" name="intIdTrRiskContext" id="intIdTrRiskContext">
<input type="hidden" name="intIdRiskSourceIdentification" id="intIdRiskSourceIdentification">
<input type="hidden" name="intIdRiskEvaluation" id="intIdRiskEvaluation">
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
						<div class="card-tools">
							<a href="<?= base_url('risk_register/dokumen') ?>" class="btn btn-tool" id="">
								<i class="fas fa-times"></i>
							</a>
						</div>
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
						<div id="show_activity_current">
							<div class="row">
								<div class="col-lg-12 col-xs-12">
									<div class="form-group">
										<label for="">Activity</label>
										<input type="text" name="" id="txtNamaActivityShow" class="form-control" value="" disabled>
									</div>
								</div>
							</div>
						</div>

						<div id="show_tahapan_current">
							<div class="row">
								<div class="col-lg-12 col-xs-12">
									<div class="form-group">
										<label for="">Tahapan Proses</label>
										<input type="text" name="" id="txtNamaTahapanShow" class="form-control" value="" disabled>
									</div>
								</div>
							</div>
						</div>

						<div id="show_context_current">
							<div class="row">
								<div class="col-lg-12 col-xs-12">
									<div class="form-group">
										<label for="">Risk Context</label>
										<div id="txtNamaContextShow" contenteditable="true"></div>
										<!-- <input type="text" name="" id="txtNamaContextShow" class="form-control" value="" disabled> -->
									</div>
								</div>
							</div>
						</div>

						<div id="show_iden_current">
							<div class="row">
								<div class="col-lg-12 col-xs-12">
									<div class="form-group">
										<label for="">Risk Identification</label>
										<input type="text" name="" id="txtNamaIdentificationShow" class="form-control" value="" disabled>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<div class="d-flex justify-content-end">
									<button class="btn btn-success" id="tombol_simpan_dokumen">Validasi</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12" id="data_act">
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
		<?php $this->load->view('pages/risk_management/risk_register/tahapan_proses'); ?>
		<?php $this->load->view('pages/risk_management/risk_register/contextTahapan'); ?>
		<?php $this->load->view('pages/risk_management/risk_register/risk_iden'); ?>
		<?php $this->load->view('pages/risk_management/risk_register/form_risk_iden'); ?>
	</section>
</div>
<!-- Modal Area -->
<?php $this->load->view('pages/risk_management/risk_register/modal/modal_add_activity'); ?>
<?php $this->load->view('pages/risk_management/risk_register/modal/modal_add_tahapan'); ?>
<?php $this->load->view('pages/risk_management/risk_register/modal/modal_add_context'); ?>

<script src="<?= base_url('assets/templates') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/summernote/summernote-bs4.min.js"></script>
<script>
	var url = `<?= base_url() ?>`;
	$("#show_activity_current, #show_tahapan_current, #show_context_current, #show_iden_current").css({
		'display': 'none'
	});
	$("#data_tahapan, #data_context, #data_risk_iden, #form_risk_iden").css({
		'display': 'none'
	});
</script>
<script src="<?= base_url('assets/custom_js') ?>/risk_management/activity_risk.js"></script>
<script src="<?= base_url('assets/custom_js') ?>/risk_management/tahapan_proses.js"></script>
<script src="<?= base_url('assets/custom_js') ?>/risk_management/risk_context.js"></script>
<script src="<?= base_url('assets/custom_js') ?>/risk_management/risk_iden.js"></script>
