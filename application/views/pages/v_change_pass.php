<body class="hold-transition bg-login-page container">
	<!-- line top -->
	<div class="row fixed-top">
		<div class="col-md-12">
			<div class="bg-header1 border-top-0 border-bottom-0"></div>
			<div class="bg-header2 border-top-0 border-bottom-0"></div>
		</div>
	</div>
	<!-- end line top -->

	<!-- login box -->
	<div class="login-box">
		<div class="login-logo">
			<a href="javascript:void(0)">
				<img src="<?= base_url('assets/templates') ?>/img/smart_logo.png" alt="" class="img-fluid">
				<h6><strong>PT ASIA PACIFIC FIBERS TBK. UNIT KARAWANG</strong></h6>
			</a>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<div class="row" id="alert_msg">
					<div class="col-12">
						<?= $this->session->flashdata('message'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<p style="color: white;" class="text-center">Untuk keamanan akun anda silahkan rubah password default anda terlebih dahulu.</p>
					</div>
				</div>
				<form action="javascript:void(0)" method="post" id="form_login">
					<div class="row mb-3">
						<div class="col-12 input-group">
							<input type="password" class="form-control" placeholder="Password" name="password" id="password">
							<span class=" input-group-text"><i class="far fa-eye-slash text-white" id="eye_toggle" style="cursor: pointer"></i></span>
						</div>
						<div class="col-12" id="notif_password">
						</div>
					</div>
					<div class="row">
						<div class="col-7">
						</div>
						<div class="col-5">
							<a class="btn btn-primary btn-block btn-login" href="javascript:void(0)">Change Pass</a>
						</div>
					</div>
				</form>

			</div>
			<div class="card-footer-login">
				<p class="text-white"><i>Before use this app, you can read <a class="link-user-manual text-warning" href="javascript:void(0)">SMART QESSH MANUAL</a></i>.</p>
			</div>
		</div>
	</div>
	<!-- Forgote Password Modal -->
	<div class="modal fade" id="forgot_pass_modal" tabindex="-1" role="dialog" aria-labelledby="forgot_pass_modalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="forgot_pass_modalTitle">Forgote Password?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_forgot_password">
						<div class="input-group mb-3">
							<input type="email" class="form-control" placeholder="Input your email.">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<button type="submit" class="btn btn-primary btn-block btn_request_new_pass">Request new password</button>
							</div>
							<!-- /.col -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			setTimeout(function() {
				$("#alert_msg").html("");
			}, 2000);
			$('#eye_toggle').on('click', function() {
				let pass_filed = document.querySelector('#password');
				if (pass_filed.type === "password") {
					pass_filed.type = "text";
					$(this).removeClass("fa-eye-slash");
					$(this).addClass("fa-eye");
				} else {
					pass_filed.type = "password";
					$(this).removeClass("fa-eye");
					$(this).addClass("fa-eye-slash");
				}
			});
			$('.btn-login').on('click', function() {
				let frm = $('#form_login');
				$.ajax({
					type: "POST",
					url: "<?= base_url() ?>auth/change_my_password",
					data: frm.serialize(),
					dataType: "json",
					success: function(response) {
						console.log(response)
						if (response.code != 200) {
							alert(response.msg)
							// if (response.code === 403) {
							// 	alert(response.msg)
							// 	//   $('#notif_password').html(`<p class="text-warning"><small>${response.msg}</small></p>`);                
							// 	// } else {
							// 	//   // 404 & 402			
							// 	// 	alert(response.msg)
							// 	//   $('#notif_username').html(`<p class="text-warning"><small>${response.msg}</small></p>`);                
							// }
						} else {
							// 200
							window.location = `<?= base_url('dashboard') ?>`
						}
					}
				});
			});
		});
	</script>
</body>
