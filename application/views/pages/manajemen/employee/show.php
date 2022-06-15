<div class="row">
	<div class="col-md-6">
		<table class="table table-borderless table-hover ">
			<tr>
				<th>Nama</th>
				<td> : </td>
				<td><?= $employee->txtNameEmployee ?></td>
			</tr>
			<tr>
				<th>NIK</th>
				<td> : </td>
				<td><?= $employee->txtNikEmployee ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td> : </td>
				<td><?= $employee->txtEmail ?></td>
			</tr>
			<tr>
				<th>No. Wa</th>
				<td> : </td>
				<td><?= $employee->txtNomorWa ?></td>
			</tr>
			<tr>
				<th>Department</th>
				<td> : </td>
				<td><?= $employee->txtNamaDepartement ?? '-' ?></td>
			</tr>
			<tr>
				<th>Jabatan</th>
				<td> : </td>
				<td><?= $employee->txtNamaJabatan ?? '-' ?></td>
			</tr>
			<tr>
				<th>TPK</th>
				<td> : </td>
				<td>
					<?php switch($employee->intTpk)
					{
						case 1: 
							echo 'Tetap';
							break;
						case 3:
							echo 'Kontrak';
							break;
						default:
							echo 'Tidak Sesuai';
							break;
					} ?>
				</td>
			</tr>
			<tr>
				<th>KPW</th>
				<td> : </td>
				<td>
				<?php switch($employee->intKpw)
					{
						case 1: 
							echo 'Pria';
							break;
						case 2:
							echo 'Wanita';
							break;
						default:
							echo 'Tidak Sesuai';
							break;
					} ?>
				</td>
			</tr>
			<tr>
				<th>KTK</th>
				<td> : </td>
				<td>
				<?php switch($employee->intKtk)
					{
						case 1: 
							echo 'Kawin';
							break;
						case 2:
							echo 'Tidak';
							break;
						default:
							echo 'Tidak Sesuai';
							break;
					} ?>
				</td>
			</tr>
			<tr>
				<th>Jumlah Anak</th>
				<td> : </td>
				<td><?= $employee->intJumlahAnak ?></td>
			</tr>
			<tr>
				<th>Tanggal Masuk</th>
				<td> : </td>
				<td><?= $employee->dtmTanggalMasuk ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table table-borderless table-hover ">
			<tr>
				<th>Tempat Lahir</th>
				<td> : </td>
				<td><?= $employee->txtTempatLahir ?></td>
			</tr>
			<tr>
				<th>Tanggal Lahir</th>
				<td> : </td>
				<td><?= $employee->dtmTanggalLahir ?></td>
			</tr>
			<tr>
				<th>Agama</th>
				<td> : </td>
				<td><?= $employee->txtNamaAgama ?? '-' ?></td>
			</tr>
			<tr>
				<th>Suku</th>
				<td> : </td>
				<td><?= $employee->txtSuku ?></td>
			</tr>
			<tr>
				<th>Golongan Darah</th>
				<td> : </td>
				<td><?= $employee->txtGolonganDarah ?></td>
			</tr>
			<tr>
				<th>Alamat 1</th>
				<td> : </td>
				<td><?= $employee->txtAlamat1 ?></td>
			</tr>
			<tr>
				<th>Alamat 2</th>
				<td> : </td>
				<td><?= $employee->txtAlamat2 ?></td>
			</tr>
			<tr>
				<th>Negara</th>
				<td> : </td>
				<td><?= $employee->txtNamaNegara ?? '-' ?></td>
			</tr>
			<tr>
				<th>Provinsi</th>
				<td> : </td>
				<td><?= $employee->txtNamaProvinsi ?? '-' ?></td>
			</tr>
			<tr>
				<th>Kota</th>
				<td> : </td>
				<td><?= $employee->txtNamaKota ?? '-' ?></td>
			</tr>
			<tr>
				<th>Jenjang Pendidikan</th>
				<td> : </td>
				<td><?= $employee->txtNamaJenjangPendidikan ?? '-' ?></td>
			</tr>
		</table>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-4">
		<h6 style="font-size: 22px;font-weight:400">Informasi Akun</h6>
		<?php if($employee->username) : ?>
		<ul class="list-unstyled">
			<li class="d-flex justify-content-between my-1">
				<span class="font-weight-bold">Username</span>
				<span><?= $employee->username ?></span>
			</li>
			<li class="d-flex justify-content-between my-1">
				<span class="font-weight-bold">Password</span>
				<span class="badge badge-secondary">
					<?php 
						if(md5($employee->username) === $employee->password)
						{
							$pass = 'Password Default';
						}else{
							$pass = 'Password Dirubah';
						}
						echo $pass;
					?>
				</span>
			</li>
			<li class="d-flex justify-content-between my-1">
				<span class="font-weight-bold">Status</span>
					<?php 
						if($employee->is_active == 1)
						{
							$pass = '<span class="badge badge-success">Aktif</span>';
						}else{
							$pass = '<span class="badge badge-danger">Tidak Aktif</span>';
						}
						echo $pass;
					?>
			</li>
			<li class="d-flex justify-content-between my-1">
				<span class="font-weight-bold">Last Login</span>
				<span><?= date('d/m/Y', $employee->last_login) ?></span>
			</li>
			<li class="d-flex justify-content-between my-1">
				<span class="font-weight-bold">IP Address</span>
				<span><?= $employee->ip_address ?></span>
			</li>
		</ul>
		<?php else: ?>
			<p class="text-left">Tidak Mempunyai Akun !</p>
		<?php endif; ?>
	</div>
</div>
