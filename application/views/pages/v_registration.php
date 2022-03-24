<<<<<<< HEAD
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
        <form action="javascript:void(0)" method="post" id="form_regist">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_user">
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email_user">
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Departemen" name="divisi_user">
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Tipe User" name="jabatan_user">
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
          <div class="row">
            <a class="btn btn-primary btn-block btn-regist" href="javascript:void(0)">SUBMIT DATA</a>
          </div>
        </form>
        <hr>
        <div class="text-center">
          <p class="text-white">Have account?</p>
        </div>

        <p class="mb-1 mt-3">
          <a href="javascript:void(0)" class="btn btn-sm btn-dark btn-block btn-registration btn-back_to_login" data-target="<?php echo base_url() ?>auth/login">BACK TO LOGIN</a>
        </p>
      </div>
      <div class="card-footer-login">
        <p class="text-white"><i>Before use this app, you can read <a class="link-user-manual text-warning" href="javascript:void(0)">SMART QESSH MANUAL</a></i>.</p>
      </div>
    </div>
  </div>
  <script>
    $('.btn-regist').on('click', function() {
      let frm = $('#form_regist');
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>auth/process_registration",
        data: frm.serialize(),
        dataType: "json",
        success: function(response) {
          console.log(response)
          if (response.status === true) {
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: response.msg,
              showConfirmButton: false,
              timer: 2500
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response.msg,
              showConfirmButton: false,
              timer: 2500
            });
          }
        }
      });
    });
    $('.btn-back_to_login').on('click', function() {
      let url = $(this).data('target');
      window.location = url;
    });
    $('.link-user-manual').on('click', function() {
      alert('menu "SMART QEESH MANUAL belum" dapat digunakan')
    });
  </script>
=======
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
        <form action="javascript:void(0)" method="post" id="form_regist">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_user">
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email_user">
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Divisi" name="divisi_user">
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Jabatan" name="jabatan_user">
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
          <div class="row">
            <a class="btn btn-primary btn-block btn-regist" href="javascript:void(0)">SUBMIT DATA</a>
          </div>
        </form>
        <hr>
        <div class="text-center">
          <p class="text-white">Have account?</p>
        </div>

        <p class="mb-1 mt-3">
          <a href="javascript:void(0)" class="btn btn-sm btn-dark btn-block btn-registration btn-back_to_login" data-target="<?php echo base_url() ?>auth/login">BACK TO LOGIN</a>
        </p>
      </div>
      <div class="card-footer-login">
        <p class="text-white"><i>Before use this app, you can read <a class="link-user-manual text-warning" href="javascript:void(0)">SMART QESSH MANUAL</a></i>.</p>
      </div>
    </div>
  </div>
  <script>
    $('.btn-regist').on('click', function() {
      let frm = $('#form_regist');
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>auth/process_registration",
        data: frm.serialize(),
        dataType: "json",
        success: function(response) {
          console.log(response)
          if (response.status === true) {
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: response.msg,
              showConfirmButton: false,
              timer: 2500
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response.msg,
              showConfirmButton: false,
              timer: 2500
            });
          }
        }
      });
    });
    $('.btn-back_to_login').on('click', function() {
      let url = $(this).data('target');
      window.location = url;
    });
    $('.link-user-manual').on('click', function() {
      alert('menu "SMART QEESH MANUAL belum" dapat digunakan')
    });
  </script>
>>>>>>> e1aee5b635052b0c966fbd37c6a39d2d7f3a8067
</body>