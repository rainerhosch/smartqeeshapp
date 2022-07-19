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
    <div class="card mt-4">
      <div class="card-body login-card-body">
        <div class="row" id="alert_msg">
          <div class="col-12">
            <?= $this->session->flashdata('message'); ?>
          </div>
        </div>
        <form action="javascript:void(0)" method="post" id="form_login">
          <div class="row mb-3">
            <div class="col-12 input-group">
              <input type="text" class="form-control" placeholder="Email or Username" name="email_or_username">
            </div>
            <div class="col-12 notif_username">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12 input-group">
              <input type="password" class="form-control" placeholder="Password" name="password" id="password">
              <span class=" input-group-text"><i class="far fa-eye-slash text-white" id="eye_toggle" style="cursor: pointer"></i></span>
            </div>
            <div class="col-12 notif_password">
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary text-white">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <a class="btn btn-primary btn-block btn-login" href="javascript:void(0)">LOGIN</a>
            </div>
          </div>
        </form>
        <hr>
        <div class="text-center">
          <p class="text-white">- OR -</p>
        </div>

        <p class="mb-1 mt-3">
          <a href="javascript:void(0)" class="btn btn-sm btn-warning btn-block btn-forget-pass">FORGOT PASSWORD</a>
          <a href="javascript:void(0)" class="btn btn-sm btn-dark btn-block btn-registration btn-registration" data-target="<?php echo base_url() ?>auth/registration">REGISTER NEW ACCOUNT</a>
        </p>
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
        <?php $this->session->unset_userdata('message'); ?>
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
          url: "<?= base_url() ?>auth/process_login",
          data: frm.serialize(),
          dataType: "json",
          success: function(response) {
            console.log(response)
            if (response.code != 200) {
              if (response.code === 403) {
                $('.notif_password').html(`<p class="text-warning"><small>${response.msg}</small></p>`);
                setTimeout(function() {
                  $('.notif_password').html(``);
                }, 2000);
              } else {
                // 404 & 402
                $('.notif_username').html(`<p class="text-warning"><small>${response.msg}</small></p>`);
                setTimeout(function() {
                  $('.notif_username').html(``);
                }, 2000);
              }
            } else {
              // 200
              if (response.data.isDefaultPassword == 0) {
                window.location = `<?= base_url('Auth/changePassword') ?>`
              } else {
                window.location = `<?= base_url('dashboard') ?>`
              }
            }
          }
        });
      });
      $('.btn-registration').on('click', function() {
        let url = $(this).data('target');
        window.location = url;
      });
      $('.btn-forget-pass').on('click', function() {
        alert('Menu not active!')
        // $('#forgot_pass_modal').modal('show');
      });
      $('.btn_request_new_pass').on('click', function() {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Link to reset password has been send to your mail, check your mailbox!',
          showConfirmButton: false,
          timer: 2500
        });
      });
      $('.link-user-manual').on('click', function() {
        alert('menu "SMART QEESH MANUAL belum" dapat digunakan')
      });
    });
  </script>
</body>