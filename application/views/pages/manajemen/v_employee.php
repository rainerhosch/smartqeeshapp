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
											name="txtNameEmployee" placeholder="Nama">
									</div>
								</div>
								<div class="form-group row">
									<label for="txtNikEmployee" class="col-sm-3 col-form-label">NIK</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtNikEmployee"
											name="txtNikEmployee" placeholder="NIK">
									</div>
								</div>
								<div class="form-group row">
									<label for="txtEmail" class="col-sm-3 col-form-label">Email</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtEmail"
											name="txtEmail" placeholder="Email">
									</div>
								</div>
								<div class="form-group row">
									<label for="txtNomorWa" class="col-sm-3 col-form-label">No. Wa</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtNomorWa"
											name="txtNomorWa" placeholder="Nomor Wa">
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
											name="intJumlahAnak" placeholder="Jumlah Anak">
									</div>
								</div>
								<div class="form-group row">
									<label for="dtmTanggalMasuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" id="dtmTanggalMasuk"
											name="dtmTanggalMasuk">
									</div>
								</div>
								<div class="form-group row">
									<label for="txtTempatLahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtTempatLahir"
											name="txtTempatLahir" placeholder="Tempat Lahir">
									</div>
								</div>
								<div class="form-group row">
									<label for="dtmTanggalLahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" id="dtmTanggalLahir"
											name="dtmTanggalLahir" placeholder="NIK">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="intIdAgama" class="col-sm-3 col-form-label">Agama</label>
									<div class="col-sm-9">
										<select name="intIdAgama" id="intIdAgama" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="txtSuku" class="col-sm-3 col-form-label">Suku</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtSuku"
											name="txtSuku" placeholder="Suku">
									</div>
								</div>
								<div class="form-group row">
									<label for="txtGolonganDarah" class="col-sm-3 col-form-label">Golongan Darah</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtGolonganDarah"
											name="txtGolonganDarah" placeholder="Golongan Darah">
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
									<label for="kewarganegaraan" class="col-sm-3 col-form-label">Kewarganegaraan</label>
									<div class="col-sm-9">
										<select id="kewarganegaraan" class="form-control" name="kewarganegaraan">
											<option value="" selected disabled>- Pilih -</option>
											<option value="wni">WNI</option>
											<option value="wna">WNA</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intIdNegara" class="col-sm-3 col-form-label">Negara</label>
									<div class="col-sm-9">
										<select name="intIdNegara" id="intIdNegara" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intIdProvinsi" class="col-sm-3 col-form-label">Provinsi</label>
									<div class="col-sm-9">
										<select name="intIdProvinsi" id="intIdProvinsi" class="form-control select2">
											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="intIdKota" class="col-sm-3 col-form-label">Kota</label>
									<div class="col-sm-9">
										<select name="intIdKota" id="intIdKota" class="form-control select2">
											
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
								<div class="form-group row">
									<label for="buatAkunUser" class="col-sm-3 col-form-label">Buat Akun User</label>
									<div class="col-md-9">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="buatAkunUser" name="buatAkunUser">
											<label class="form-check-label" for="buatAkunUser">Ya</label>
										</div>
									</div>
								</div>
								<div class="form-group row fg-kirimNotifikasiWa d-none">
									<label for="kirimNotifikasiWa" class="col-sm-3 col-form-label">Kirim Notifikasi</label>
									<div class="col-md-9">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="kirimNotifikasiWa" name="KirimNotivikasiWa">
											<label class="form-check-label" for="kirimNotifikasiWa">Ya</label>
										</div>
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

		function negaras(kwn)
		{
			var neg;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				data:{
					kwn
				},
				url: '<?= base_url('manajemen/negara/get') ?>',
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
		function provinsis(kode_negara)
		{
			var wil;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/lokasi/getProvinsi/') ?>',
				data: {
					kode_negara:kode_negara
				},
				success: function (res) {
					wil = res.data;
				}
			})
			return wil;
		}

		function kotas(id_provinsi)
		{
			var kot;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/lokasi/getKota/') ?>',
				data: {
					id_provinsi
				},
				success: function (res) {
					kot = res.data;
				}
			})
			return kot;
		}

		function getEmployeeById(id)
		{
			var kot;
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				async: false,
				url: '<?= base_url('manajemen/employee/getEmployeeById/') ?>',
				data: {
					id
				},
				success: function (res) {
					kot = res.data;
				}
			})
			return kot;
		}
</script>
<script>
	$(document).ready(function () {
		
		let departments2 = departments();
		let jabatans2 = jabatans();
		let agamas2 = agamas();
		let pendidikans2 = pendidikans();
		$('.select2').select2({
			theme:'bootstrap4',
			width: 'auto',
			tags:true,
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
				
					html_mn += `<td class="text-center">${val.txtNamaDepartement}</td>`;
					html_mn += `<td class="text-center">${val.txtNamaJabatan}</td>`;
					html_mn +=
						`<td class="text-center"><a class="btn btn-xs btn-info btnShow" data-url="<?= base_url('manajemen/employee/show/') ?>${val.intIdEmployee}" data-nik="${val.txtNikEmployee}" data-nama="${val.txtNameEmployee}"><i class="fas fa-eye"></i></a> |<a class="btn btn-xs btn-warning btnEdit" data-id="${val.intIdEmployee}" data-negara="${val.txtNamaNegara}" data-nama="${val.txtNameEmployee}"><i class="fas fa-pen"></i></a> | <a class="btn btn-xs btn-danger btnDelete" data-id="${val.intIdEmployee}" data-name="${val.txtNameEmployee}"><i class="fas fa-trash-alt"></i></a></td>`;
					html_mn += `</tr>`;
				});
				$('#menu_tbody').html(html_mn);

				// event Klik tombol add
				$('.btnAdd').on('click', function () {

					// plant
					// plants = plants();
				

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

					$('#kewarganegaraan').on('change', function(){
						var kwn = $(this).val();
						negaras2 = negaras(kwn)
						// negaras = negaras();
						$('#intIdNegara').empty();
						$('#intIdNegara').append('<option selected disabled>-Pilih-</option>');
						$.each(negaras2, function(key,value){
							$('#intIdNegara').append('<option value="'+value['intIdNegara']+'">'+ value['txtNamaNegara'] +'</option>');
						})
					})

					

					// pendidikans
					// pendidikans = pendidikans();
					$('#intIdJenjangPendidikan').empty();
					$('#intIdJenjangPendidikan').append('<option selected disabled>-Pilih-</option>');
					$.each(pendidikans2, function(key,value){
						$('#intIdJenjangPendidikan').append('<option value="'+value['intIdJenjangPendidikan']+'">'+ value['txtNamaJenjangPendidikan'] +'</option>');
					})

					// get provinsi
					$('#intIdNegara').on('change', function(){
						var id = $(this).val();
						provinsis2 = provinsis(id);
						$('#intIdProvinsi').empty();
						$('#intIdProvinsi').append('<option selected disabled>-Pilih-</option>');
						$.each(provinsis2, function(key,value){
							$('#intIdProvinsi').append('<option value="'+value['intIdProvinsi']+'">'+ value['txtNamaProvinsi'] +'</option>');
						})
					})

					// get kota
					$('#intIdProvinsi').on('change', function(){
						var id_provinsi = $(this).val();
						kota2 = kotas(id_provinsi);
						$('#intIdKota').empty();
						$('#intIdKota').append('<option selected disabled>-Pilih-</option>');
						$.each(kota2, function(key,value){
							$('#intIdKota').append('<option value="'+value['intIdKota']+'">'+ value['txtNamaKota'] +'</option>');
						})
					})

					$('#txtNomorWa').on('keyup', function(){
						var wa = $(this).val();
						if(wa.length > 0)
						{
							$('.fg-kirimNotifikasiWa').removeClass('d-none');
						}else{
							$('.fg-kirimNotifikasiWa').addClass('d-none');
						}
					})
						
					$('.modal-title').text('Tambah Employee');
					$('#myModal').modal({
						backdrop: 'static',
						keyboard: false
					}, 'show');
				})

				$('body').on('click', '.btnEdit', function () {
					var id = $(this).data('id');
					employee = getEmployeeById(id);
					$('.modal-title').text('Edit Employee');
					$('#intIdEmployee').val(id);
					$('#txtNameEmployee').val(employee.txtNameEmployee);
					$('#txtNikEmployee').val(employee.txtNikEmployee);
					$('#txtEmail').val(employee.txtEmail);
					// plants = plants();
				

					// departments
					// departments = departments();
					$('#intIdDepartment').empty();
					$('#intIdDepartment').append('<option selected disabled>-Pilih-</option>');
					$.each(departments2, function(key,value){
						if(value['intIdDepartement'] === employee.intIdDepartment)
						{
							$('#intIdDepartment').append('<option selected value="'+value['intIdDepartement']+'">'+ value['txtNamaDepartement'] +'</option>');
						}else{
							$('#intIdDepartment').append('<option value="'+value['intIdDepartement']+'">'+ value['txtNamaDepartement'] +'</option>');
						}
					})

					// jabatans
					// jabatans = jabatans();
					$('#intIdJabatan').empty();
					$('#intIdJabatan').append('<option selected disabled>-Pilih-</option>');
					$.each(jabatans2, function(key,value){
						if(value['intIdJabatan'] === employee.intIdJabatan)
						{
							$('#intIdJabatan').append('<option selected value="'+value['intIdJabatan']+'">'+ value['txtNamaJabatan'] +'</option>');
						}else{
							$('#intIdJabatan').append('<option value="'+value['intIdJabatan']+'">'+ value['txtNamaJabatan'] +'</option>');
						}
					})


					// agamas
					// agamas = agamas();
					$('#intIdAgama').empty();
					$('#intIdAgama').append('<option selected disabled>-Pilih-</option>');
					$.each(agamas2, function(key,value){
						if(value['intidAgama'] === employee.intIdAgama)
						{
							$('#intIdAgama').append('<option selected value="'+value['intidAgama']+'">'+ value['txtNamaAgama'] +'</option>');
						}else{
							$('#intIdAgama').append('<option value="'+value['intidAgama']+'">'+ value['txtNamaAgama'] +'</option>');
						}
					})

					
					$('#kewarganegaraan').empty();
					$('#kewarganegaraan').append('<option selected disabled>-Pilih-</option>');
					var nmNegara = $(this).data('negara');
					if(nmNegara === 'Indonesia' || nmNegara === 'indonesia')
					{
						$('#kewarganegaraan').append('<option selected value="wni">WNI</option>');
						$('#kewarganegaraan').append('<option value="wna">WNA</option>');
					}else{
						$('#kewarganegaraan').append('<option value="wni">WNI</option>');
						$('#kewarganegaraan').append('<option selected value="wna">WNA</option>');
					}

					$('#kewarganegaraan').on('change', function(){
						var kwn = $(this).val();
						negaras2 = negaras(kwn);
						$('#intIdNegara').empty();
						$('#intIdNegara').append('<option selected disabled>-Pilih-</option>');
						$.each(negaras2, function(key,value){
							if(value['intIdNegara'] === employee.intIdNegara)
							{
								$('#intIdNegara').append('<option selected value="'+value['intIdNegara']+'">'+ value['txtNamaNegara'] +'</option>');
							}else{
								$('#intIdNegara').append('<option value="'+value['intIdNegara']+'">'+ value['txtNamaNegara'] +'</option>');
							}
						})
					})
					var kwn = $('#kewarganegaraan').val();
					negaras2 = negaras(kwn);
					$('#intIdNegara').empty();
					$('#intIdNegara').append('<option selected disabled>-Pilih-</option>');
					$.each(negaras2, function(key,value){
						if(value['intIdNegara'] === employee.intIdNegara)
						{
							$('#intIdNegara').append('<option selected value="'+value['intIdNegara']+'">'+ value['txtNamaNegara'] +'</option>');
						}else{
							$('#intIdNegara').append('<option value="'+value['intIdNegara']+'">'+ value['txtNamaNegara'] +'</option>');
						}
					})


					// pendidikans
					// pendidikans = pendidikans();
					$('#intIdJenjangPendidikan').empty();
					$('#intIdJenjangPendidikan').append('<option selected disabled>-Pilih-</option>');
					$.each(pendidikans2, function(key,value){
						if(value['intIdJenjangPendidikan'] === employee.intIdJenjangPendidikan)
						{
							$('#intIdJenjangPendidikan').append('<option selected value="'+value['intIdJenjangPendidikan']+'">'+ value['txtNamaJenjangPendidikan'] +'</option>');
						}else{
							$('#intIdJenjangPendidikan').append('<option value="'+value['intIdJenjangPendidikan']+'">'+ value['txtNamaJenjangPendidikan'] +'</option>');
						}
					})

					// set provinsi
					var kodenegara = $('#intIdNegara').val();;
					provinsis2 = provinsis(kodenegara);
					$('#intIdProvinsi').empty();
					$('#intIdProvinsi').append('<option selected disabled>-Pilih-</option>');
					$.each(provinsis2, function(key,value){
						if(value['intIdProvinsi'] === employee.intIdProvinsi)
						{
							$('#intIdProvinsi').append('<option selected value="'+value['intIdProvinsi']+'">'+ value['txtNamaProvinsi'] +'</option>');
						}else{
							$('#intIdProvinsi').append('<option value="'+value['intIdProvinsi']+'">'+ value['txtNamaProvinsi'] +'</option>');
						}
					})

					// get provinsi
					$('#intIdNegara').on('change', function(){
						var kode = $(this).val();;
						provinsis2 = provinsis(kode);
						$('#intIdProvinsi').empty();
						$('#intIdProvinsi').append('<option selected disabled>-Pilih-</option>');
						$.each(provinsis2, function(key,value){
							if(value['intIdProvinsi'] === employee.intIdProvinsi)
							{
								$('#intIdProvinsi').append('<option selected value="'+value['intIdProvinsi']+'">'+ value['txtNamaProvinsi'] +'</option>');
							}else{
								$('#intIdProvinsi').append('<option value="'+value['intIdProvinsi']+'">'+ value['txtNamaProvinsi'] +'</option>');
							}
						})
					})

					// set kota
					var idprov = $('#intIdProvinsi').val();;;
					kota2 = kotas(idprov);
					$('#intIdKota').empty();
					$('#intIdKota').append('<option selected disabled>-Pilih-</option>');
					$.each(kota2, function(key,value){
						if(value['intIdKota'] === employee.intIdKota)
						{
							$('#intIdKota').append('<option selected value="'+value['intIdKota']+'">'+ value['txtNamaKota'] +'</option>');
						}else{
							$('#intIdKota').append('<option value="'+value['intIdKota']+'">'+ value['txtNamaKota'] +'</option>');
						}
					})

					// get kota
					$('#intIdProvinsi').on('change', function(){
						var id_provinsi = $(this).val();
						kota2 = kotas(id_provinsi);
						$('#intIdKota').empty();
						$('#intIdKota').append('<option selected disabled>-Pilih-</option>');
						$.each(kota2, function(key,value){
							if(value['intIdKota'] === employee.intIdKota)
							{
								$('#intIdKota').append('<option selected value="'+value['intIdKota']+'">'+ value['txtNamaKota'] +'</option>');
							}else{
								$('#intIdKota').append('<option value="'+value['intIdKota']+'">'+ value['txtNamaKota'] +'</option>');
							}
						})
					})

					// tpk
					$('#intTpk').empty();
					$('#intTpk').append('<option selected disabled>-Pilih-</option>');
					if(employee.intTpk == 1)
					{
						$('#intTpk').append('<option selected value="1">Tetap</option>');
						$('#intTpk').append('<option value="3">Kontrak</option>');
					}else{
						$('#intTpk').append('<option value="1">Tetap</option>');
						$('#intTpk').append('<option selected value="3">Kontrak</option>');
					}

					// kpw
					$('#intKpw').empty();
					$('#intKpw').append('<option selected disabled>-Pilih-</option>');
					if(employee.intKpw == 1)
					{
						$('#intKpw').append('<option selected value="1">Pria</option>');
						$('#intKpw').append('<option value="2">Wanita</option>');
					}else{
						$('#intKpw').append('<option value="1">Pria</option>');
						$('#intKpw').append('<option selected value="2">Wanita</option>');
					}


					// kpw
					$('#intKtk').empty();
					$('#intKtk').append('<option selected disabled>-Pilih-</option>');
					if(employee.intKtk == 1)
					{
						$('#intKtk').append('<option selected value="1">Kawin</option>');
						$('#intKtk').append('<option value="2">Tidak</option>');
					}else{
						$('#intKtk').append('<option value="1">Kawin</option>');
						$('#intKtk').append('<option selected value="2">Tidak</option>');
					}

					$('#intJumlahAnak').val(employee.intJumlahAnak);
					$('#dtmTanggalMasuk').val(employee.dtmTanggalMasuk);
					$('#txtTempatLahir').val(employee.txtTempatLahir);
					$('#dtmTanggalLahir').val(employee.dtmTanggalLahir);
					$('#txtSuku').val(employee.txtSuku);
					$('#txtGolonganDarah').val(employee.txtGolonganDarah);
					$('#txtAlamat1').val(employee.txtAlamat1);
					$('#txtAlamat2').val(employee.txtAlamat2);
					$('#myModal').modal('show');
				})

				// button show
				$('body').on('click', '.btnShow', function () {
					var nik = $(this).data('nik');
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
									if(response.redirect)
									{
										var link = "https://wa.me/"+response.no_wa+'?text='+response.isiPesan; 
										window.open(link, '_blank');
									}
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
			$('#intJumlahAnak').val('');
			$('#dtmTanggalMasuk').val('');
			$('#txtTempatLahir').val('');
			$('#dtmTanggalLahir').val('');
			$('#txtSuku').val('');
			$('#txtGolonganDarah').val('');
			$('#txtAlamat1').val('');
			$('#txtAlamat2').val('');
			$('#intIdEmployee').val('');
			$('#txtNameEmployee').val('');
			$('#txtNikEmployee').val('');
			$('#txtEmail').val('');
			$('#intIdPlant').empty();
			$('#intIdDepartment').empty();
			$('#intIdJabatan').empty();
			$('#intTpk').empty();
			$('#intKpw').empty();
			$('#intKtk').empty();
			$('#intIdAgama').empty();
			$('#intIdNegara').empty();
			$('#intIdProvinsi').empty();
			$('#intIdKota').empty();
			$('#intIdJenjangPendidikan').empty();
		})
	});

</script>
