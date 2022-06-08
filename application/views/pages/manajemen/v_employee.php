<!-- Content Wrapper. Contains page content -->
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
				<div class="col-12">
					<div class="card bg-white">
						<div class="card-header">
							<h3 class="card-title">Data <?= $subpage; ?></h3>
							<div class="card-tools">
								<div class="input-group input-group-sm" style="width: 150px;">
									<input type="text" name="search" class="form-control float-right inputSearch"
										placeholder="Search">

									<div class="input-group-append">
										<button type="submit" class="btn btn-default btnSearch">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<a class="btn btn-sm btn-primary btnAdd mb-2" data-toggle="modal">Add Employee</a>
							<table class="table table-sm">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">NAMA</th>
										<th class="text-center">NIK</th>
										<th class="text-center">PLANT</th>
										<th class="text-center">DEPARTEMENT</th>
										<th class="text-center">JABATAN</th>
										<th class="text-center">TOOL</th>
									</tr>
								</thead>
								<tbody id="menu_tbody">
								</tbody>
							</table>
						</div>
						<div class="card-footer clearfix">
							<ul class="pagination pagination-sm m-0 float-right">
								<li class="page-item"><a class="page-link" href="#">«</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">»</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- modal add menu -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalAddMenuTitle" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form action="" method="post" id="myForm">
						<input type="number" name="intIdEmployee" id="intIdEmployee" hidden>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="txtNameEmployee" class="col-sm-3 col-form-label">Nama</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtNameEmployee"
											name="txtNameEmployee" placeholder="Nama" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="txtNikEmployee" class="col-sm-3 col-form-label">NIK</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtNikEmployee"
											name="txtNikEmployee" placeholder="NIK" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="intIdPlant" class="col-sm-3 col-form-label">Plant</label>
									<div class="col-sm-9">
										<select name="intIdPlant" id="intIdPlant" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intIdDepartment" class="col-sm-3 col-form-label">Department</label>
									<div class="col-sm-9">
										<select name="intIdDepartment" id="intIdDepartment" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intIdJabatan" class="col-sm-3 col-form-label">Jabatan</label>
									<div class="col-sm-9">
										<select name="intIdJabatan" id="intIdJabatan" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intTpk" class="col-sm-3 col-form-label">TPK</label>
									<div class="col-sm-9">
										<select name="intTpk" id="intTpk" class="form-control">
											<option value="" disabled selected>-Pilih-</option>
											<option value="1">Tetap</option>
											<option value="3">Kontrak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intKpw" class="col-sm-3 col-form-label">KPW</label>
									<div class="col-sm-9">
										<select name="intKpw" id="intKpw" class="form-control">
											<option value="" disabled selected>-Pilih-</option>
											<option value="1">Pria</option>
											<option value="2">Wanita</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intKtk" class="col-sm-3 col-form-label">KTK</label>
									<div class="col-sm-9">
										<select name="intKtk" id="intKtk" class="form-control">
											<option value="" disabled selected>-Pilih-</option>
											<option value="1">Kawin</option>
											<option value="2">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intJumlahAnak" class="col-sm-3 col-form-label">Jumlah Anak</label>
									<div class="col-sm-9">
										<input type="number" class="form-control" id="intJumlahAnak"
											name="intJumlahAnak" placeholder="Jumlah Anak" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="dtmTanggalMasuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" id="dtmTanggalMasuk"
											name="dtmTanggalMasuk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="txtTempatLahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtTempatLahir"
											name="txtTempatLahir" placeholder="Tempat Lahir" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="dtmTanggalLahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" id="dtmTanggalLahir"
											name="dtmTanggalLahir" placeholder="NIK" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="intIdAgama" class="col-sm-3 col-form-label">Agama</label>
									<div class="col-sm-9">
										<select name="intidAgama" id="intIdAgama" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="txtSuku" class="col-sm-3 col-form-label">Suku</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtSuku"
											name="txtSuku" placeholder="Suku" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="txtGolonganDarah" class="col-sm-3 col-form-label">Golongan Darah</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtGolonganDarah"
											name="txtGolonganDarah" placeholder="Golongan Darah" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="txtAlamat1" class="col-sm-3 col-form-label">Alamat 1</label>
									<div class="col-sm-9">
										<textarea name="txtAlamat1" id="txtAlamat1" cols="30" rows="3" class="form-control" placeholder="Alamat 1"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="txtAlamat2" class="col-sm-3 col-form-label">Alamat 2</label>
									<div class="col-sm-9">
										<textarea name="txtAlamat2" id="txtAlamat2" cols="30" rows="3" class="form-control" placeholder="Alamat 2"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="txtKodeNegara" class="col-sm-3 col-form-label">Negara</label>
									<div class="col-sm-9">
										<select  id="txtKodeNegara" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intIdWilayah" class="col-sm-3 col-form-label">Wilayah</label>
									<div class="col-sm-9">
										<select name="intIdWilayah" id="intIdWilayah" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intIdJenjangPendidikan" class="col-sm-3 col-form-label">Jenjang Pendidikan</label>
									<div class="col-sm-9">
										<select name="intIdJenjangPendidikan" id="intIdJenjangPendidikan" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group">
								<button type="submit" class="btn btn-primary float-right btnSave">Submit</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="modalAddMenuTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="<?= base_url('assets/templates/plugins/select2/css/select2.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/templates/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
<script src="<?= base_url('assets/templates/plugins/select2/js/select2.min.js') ?>"></script>
<script>
	function plants()
		{
			var plantItem;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/plant/getsPlant') ?>',
				success: function (res) {
					plantItem = res;
				}
			})
			return plantItem;
		}

		function departments()
		{
			var dep;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/employee/getDepartments') ?>',
				success: function (res) {
					dep = res.data;
				}
			})
			return dep;
		}

		function jabatans()
		{
			var jab;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/jabatan/get_json') ?>',
				success: function (res) {
					jab = res.data;
				}
			})
			return jab;
		}

		function agamas()
		{
			var aga;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/agama/get_json') ?>',
				success: function (res) {
					aga = res.data;
				}
			})
			return aga;
		}

		function negaras()
		{
			var neg;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/negara/get_json') ?>',
				success: function (res) {
					neg = res.data;
				}
			})
			return neg;
		}

		function pendidikans()
		{
			var jen;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/jenjang_pendidikan/get_json') ?>',
				success: function (res) {
					jen = res.data;
				}
			})
			return jen;
		}
		function wilayahs(kode_negara)
		{
			var wil;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/wilayah/getByKodeNegara/') ?>',
				data: {
					kode_negara:kode_negara
				},
				success: function (res) {
					wil = res.data;
				}
			})
			return wil;
		}
</script>
<script>
	$(document).ready(function () {
		let plants2 = plants();
		let departments2 = departments();
		let jabatans2 = jabatans();
		let agamas2 = agamas();
		let negaras2 = negaras();
		let pendidikans2 = pendidikans();
		$('.select2').select2({
			theme:'bootstrap4',
			width: 'auto',
			dropdownParent: $('#myModal')
		});
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>manajemen/employee/get_json",
			dataType: "json",
			success: function (response) {
				var html_mn = ``;
				var no = ``;
				$.each(response.data, function (key, val) {
					no = key + 1;
					html_mn += `<tr>`;
					html_mn += `<td class="text-center">${no}</td>`;
					html_mn += `<td class="text-center">${val.txtNameEmployee}</td>`;
					html_mn += `<td class="text-center">${val.txtNikEmployee}</td>`;
					html_mn += `<td class="text-center">${val.txtNamaPlant}</td>`;
					html_mn += `<td class="text-center">${val.txtNamaDepartement}</td>`;
					html_mn += `<td class="text-center">${val.txtNamaJabatan}</td>`;
					html_mn +=
						`<td class="text-center"><a class="btn btn-xs btn-info btnShow" data-url="<?= base_url('manajemen/employee/show/') ?>${val.intIdEmployee}" data-id="${val.intIdEmployee}" data-nama="${val.txtNameEmployee}"><i class="fas fa-eye"></i></a> |<a class="btn btn-xs btn-warning btnEdit" data-id="${val.intIdEmployee}" data-nama="${val.txtNameEmployee}"><i class="fas fa-pen"></i></a> | <a class="btn btn-xs btn-danger btnDelete" data-id="${val.intIdEmployee}" data-name="${val.txtNameEmployee}"><i class="fas fa-trash-alt"></i></a></td>`;
					html_mn += `</tr>`;
				});
				$('#menu_tbody').html(html_mn);

				// event Klik tombol add
				$('.btnAdd').on('click', function () {

					

					// plant
					// plants = plants();
					$('#intIdPlant').empty();
					$('#intIdPlant').append('<option selected disabled>-Pilih-</option>');
					$.each(plants2, function(key,value){
						$('#intIdPlant').append('<option value="'+value['intIdPlant']+'">'+ value['txtNamaPlant'] +'</option>');
					})

					// departments
					// departments = departments();
					$('#intIdDepartment').empty();
					$('#intIdDepartment').append('<option selected disabled>-Pilih-</option>');
					$.each(departments2, function(key,value){
						$('#intIdDepartment').append('<option value="'+value['intIdDepartement']+'">'+ value['txtNamaDepartement'] +'</option>');
					})

					// jabatans
					// jabatans = jabatans();
					$('#intIdJabatan').empty();
					$('#intIdJabatan').append('<option selected disabled>-Pilih-</option>');
					$.each(jabatans2, function(key,value){
						$('#intIdJabatan').append('<option value="'+value['intIdJabatan']+'">'+ value['txtNamaJabatan'] +'</option>');
					})


					// agamas
					// agamas = agamas();
					$('#intIdAgama').empty();
					$('#intIdAgama').append('<option selected disabled>-Pilih-</option>');
					$.each(agamas2, function(key,value){
						$('#intIdAgama').append('<option value="'+value['intidAgama']+'">'+ value['txtNamaAgama'] +'</option>');
					})

					// negaras
					// negaras = negaras();
					$('#txtKodeNegara').empty();
					$('#txtKodeNegara').append('<option selected disabled>-Pilih-</option>');
					$.each(negaras2, function(key,value){
						$('#txtKodeNegara').append('<option value="'+value['txtKodeNegara']+'">'+ value['txtNamaNegara'] +'</option>');
					})

					// pendidikans
					// pendidikans = pendidikans();
					$('#intIdJenjangPendidikan').empty();
					$('#intIdJenjangPendidikan').append('<option selected disabled>-Pilih-</option>');
					$.each(pendidikans2, function(key,value){
						$('#intIdJenjangPendidikan').append('<option value="'+value['intIdJenjangPendidikan']+'">'+ value['txtNamaJenjangPendidikan'] +'</option>');
					})

					// wilayah
					$('#txtKodeNegara').on('change', function(){
						var kode = $(this).val();
						wilayahs2 = wilayahs(kode);
						
						$('#intIdWilayah').empty();
						$('#intIdWilayah').append('<option selected disabled>-Pilih-</option>');
						$.each(wilayahs2, function(key,value){
							$('#intIdWilayah').append('<option value="'+value['intIdWilayah']+'">'+ value['txtNamaWilayah'] +'</option>');
						})
					})
						
					$('.modal-title').text('Tambah Employee');
					$('#myModal').modal({
						backdrop: 'static',
						keyboard: false
					}, 'show');
				})

				$('body').on('click', '.btnEdit', function () {
					var id = $(this).data('id');
					var nama = $(this).data('nama');
					$('.modal-title').text('Edit Employee');
					$('#intIdEmployee').val(id);
					$('#txtNameEmployee').val(nama);
					$('#myModal').modal('show');
				})

				// button show
				$('body').on('click', '.btnShow', function () {
					var id = $(this).data('id');
					var url = $(this).data('url');
					$('#modalShow .modal-title').text('Detail Employee');
					$('#modalShow').find('.modal-body').load(url);
					$('#modalShow').modal('show');
				})

				// event submit
				$('#myForm').on('submit', function (e) {
					e.preventDefault();
					var id = $('#intIdEmployee').val();
					var form = $('#myForm');
					$.ajax({
						type: "POST",
						url: "<?= base_url() ?>manajemen/employee/store",
						data: form.serializeArray(),
						dataType: "json",
						success: function (response) {
							if (response.code == 200) {
								var icon = 'success';
								var title = 'Success';
								var text = response.msg;
								Swal.fire({
									icon: icon,
									title: title,
									text: text
								}).then(function (isConfirm) {
									location.reload();
								})
							} else if (response.code == 400) {
								var icon = 'error';
								var title = 'Error';
								var text = response.msg;

								Swal.fire({
									icon: icon,
									title: title,
									text: text
								})
							}
						}
					})

				})

				// event klik delete
				$('body').on('click', '.btnDelete', function () {
					var id = $(this).data('id');
					var name = $(this).data('name');
					Swal.fire({
						title: 'Are you sure?',
						text: `The Type ${name}, will delete!`,
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								type: "POST",
								url: "<?= base_url() ?>manajemen/employee/destroy",
								data: {
									id: id
								},
								dataType: "json",
								success: function (response) {
									if (response.code == 200) {
										var icon = 'success';
										var title = 'Deleted';
										var text = response.msg;
									} else if (response.code == 400) {
										var icon = 'error';
										var title = 'Error';
										var text = response.msg;
									}
									Swal.fire({
										icon: icon,
										title: title,
										text: text
									}).then(function (isConfirm) {
										location.reload();
									})
								}
							})
						}
					})
				})

				// event search
				$('.inputSearch').on('keyup', function () {
					var keyword = $(this).val();
					$.ajax({
						type: "POST",
						url: "<?= base_url() ?>manajemen/employee/search",
						dataType: "json",
						data: {
							keyword: keyword
						},
						success: function (response) {
							var html_mn = ``;
							var no = ``;
							$.each(response.data, function (key, val) {
								no = key + 1;
								html_mn += `<tr>`;
								html_mn += `<td class="text-center">${no}</td>`;
								html_mn += `<td class="text-center">${val.txtNameEmployee}</td>`;
								html_mn += `<td class="text-center">${val.txtNikEmployee}</td>`;
								html_mn += `<td class="text-center">${val.txtNamaPlant}</td>`;
								html_mn += `<td class="text-center">${val.txtNamaDepartement}</td>`;
								html_mn += `<td class="text-center">${val.txtNamaJabatan}</td>`;
								html_mn +=
									`<td class="text-center"><a class="btn btn-xs btn-info btnShow" data-url="<?= base_url('manajemen/employee/show/') ?>${val.intIdEmployee}" data-id="${val.intIdEmployee}" data-nama="${val.txtNameEmployee}"><i class="fas fa-eye"></i></a> |<a class="btn btn-xs btn-warning btnEdit" data-id="${val.intIdEmployee}" data-nama="${val.txtNameEmployee}"><i class="fas fa-pen"></i></a> | <a class="btn btn-xs btn-danger btnDelete" data-id="${val.intIdEmployee}" data-name="${val.txtNameEmployee}"><i class="fas fa-trash-alt"></i></a></td>`;
								html_mn += `</tr>`;
							});
							$('#menu_tbody').html(html_mn);
						}
					})
				})
			}
		});

		$('#myModal').on('hidden.bs.modal', function () {
			
		})
	});

</script>
